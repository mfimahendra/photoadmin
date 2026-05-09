<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialController extends Controller
{
    public function index()
    {
        $categories = DB::table('m_expenses')->get();
                    

        return view('financial.index', compact('categories'));
    }


    public function fetch(Request $request)
    {
        try {

            $year = $request->input('year', date('Y')); // default to current year if not provided

            // gather data revenue from t_projects based on sales_log for the month
            $revenueData = DB::table('t_projects')
                ->select(
                    DB::raw("DATE_FORMAT(sales_log, '%Y-%m') as month"),
                    DB::raw("'Revenue' as category"),
                    DB::raw('SUM(services_price + additional_price) as amount')
                )
                ->whereYear('sales_log', $year)
                ->groupBy(DB::raw("DATE_FORMAT(sales_log, '%Y-%m')"))
                ->get()
                ->toArray();
        

            // gather expenses data (one-time transactions)
            $expensesData = DB::table('t_expenses')
                ->select(
                    DB::raw("DATE_FORMAT(date, '%Y-%m') as month"),
                    'category',
                    DB::raw('SUM(price) as amount')
                )
                ->whereYear('date', $year)
                ->groupBy(DB::raw("DATE_FORMAT(date, '%Y-%m')"), 'category')
                ->get()
                ->toArray();

            // gather subscription data with monthly breakdown
            $subscriptionsData = [];
            $startDate = $year . '-01-01';
            $endDate = $year . '-12-31';

            $subscriptions = DB::table('t_subscriptions')
                ->where(function($query) use ($startDate, $endDate) {
                    $query->whereBetween('valid_from', [$startDate, $endDate])
                          ->orWhereBetween('valid_to', [$startDate, $endDate])
                          ->orWhere(function($q) use ($startDate, $endDate) {
                              $q->where('valid_from', '<=', $startDate)
                                ->where('valid_to', '>=', $endDate);
                          });
                })
                ->get();

            foreach ($subscriptions as $subscription) {
                // Breakdown per month
                $validFrom = new \DateTime($subscription->valid_from);
                $validTo = new \DateTime($subscription->valid_to);
                $yearStart = new \DateTime($startDate);
                $yearEnd = new \DateTime($endDate);

                // Get overlap period
                $periodStart = max($validFrom, $yearStart);
                $periodEnd = min($validTo, $yearEnd);

                // Calculate total months in subscription period (from valid_from to valid_to)
                $totalMonths = $validFrom->diff($validTo)->m + 
                              ($validFrom->diff($validTo)->y * 12) + 1;
                
                $pricePerMonth = $subscription->price / $totalMonths;

                // Loop through each month in the overlap period
                $current = clone $periodStart;
                while ($current <= $periodEnd) {
                    $monthKey = $current->format('Y-m');
                    
                    $subscriptionsData[] = (object)[
                        'month' => $monthKey,
                        'category' => $subscription->category,
                        'amount' => round($pricePerMonth, 2)
                    ];
                    
                    $current->modify('first day of next month');
                }
            }

            // Combine all data
            $financial_data = array_merge($revenueData, $expensesData, $subscriptionsData);

            $response = [
                'status' => true,
                'message' => 'Financial data fetched successfully',
                'data' => $financial_data,
            ];

            return response()->json($response);

        } catch (\Throwable $th) {
            $response = [
                'error' => 'Failed to fetch financial data',
                'message' => $th->getMessage(),
            ];

            return response()->json($response, 500);
        }
    }


    public function indexExpenses()
    {
        return view('financial.expenses');
    }

    public function indexJournal()
    {
        $accounts = DB::table('m_accounts')->get();
        
        return view('financial.transaction_journal', compact('accounts'));
    }

    public function fetchJournalData(Request $request)
    {
        try {
            $dateRange = $request->input('date', date('Y-m-d') . ' - ' . date('Y-m-d'));
            $accountDebit = $request->input('account_debit');
            $accountKredit = $request->input('account_kredit');

            // Parse date range
            $dates = explode(' - ', $dateRange);
            $startDate = $dates[0];
            $endDate = isset($dates[1]) ? $dates[1] : $dates[0];

            $journalData = [];

            // 1. Get Expenses
            $expenses = DB::table('t_expenses')
                ->whereBetween('date', [$startDate, $endDate])
                ->get();

            foreach ($expenses as $expense) {
                $journalData[] = [
                    'id' => 'expense_' . $expense->id,
                    'date' => $expense->date,
                    'description' => $expense->detail,
                    'source' => 'Expense',
                    'is_tax' => '-',
                    'price' => $expense->price,
                    'debit' => $expense->category,
                    'credit' => '-',
                    'type' => 'expense'
                ];
            }

            // 2. Get Subscriptions with monthly breakdown
            $subscriptions = DB::table('t_subscriptions')
                ->where(function($query) use ($startDate, $endDate) {
                    $query->whereBetween('valid_from', [$startDate, $endDate])
                          ->orWhereBetween('valid_to', [$startDate, $endDate])
                          ->orWhere(function($q) use ($startDate, $endDate) {
                              $q->where('valid_from', '<=', $startDate)
                                ->where('valid_to', '>=', $endDate);
                          });
                })
                ->get();

            foreach ($subscriptions as $subscription) {
                // Breakdown per month
                $validFrom = new \DateTime($subscription->valid_from);
                $validTo = new \DateTime($subscription->valid_to);
                $start = new \DateTime($startDate);
                $end = new \DateTime($endDate);

                // Get overlap period
                $periodStart = max($validFrom, $start);
                $periodEnd = min($validTo, $end);

                // Calculate months in subscription period
                $totalMonths = $validFrom->diff($validTo)->m + 
                              ($validFrom->diff($validTo)->y * 12) + 1;
                
                $pricePerMonth = $subscription->price / $totalMonths;

                // Loop through each month in the overlap period
                $current = clone $periodStart;
                while ($current <= $periodEnd) {
                    $monthDate = $current->format('Y-m-01');
                    
                    $journalData[] = [
                        'id' => 'subscription_' . $subscription->id . '_' . $current->format('Ym'),
                        'date' => $monthDate,
                        'description' => $subscription->description,
                        'source' => 'Subscription - ' . $subscription->category,
                        'is_tax' => '-',
                        'price' => round($pricePerMonth, 2),
                        'debit' => $subscription->category,
                        'credit' => '-',
                        'type' => 'subscription'
                    ];
                    
                    $current->modify('first day of next month');
                }
            }

            // Apply filters
            if ($accountDebit) {
                $journalData = array_filter($journalData, function($item) use ($accountDebit) {
                    return $item['debit'] == $accountDebit;
                });
            }

            if ($accountKredit) {
                $journalData = array_filter($journalData, function($item) use ($accountKredit) {
                    return $item['credit'] == $accountKredit;
                });
            }

            // Sort by date
            usort($journalData, function($a, $b) {
                return strtotime($a['date']) - strtotime($b['date']);
            });

            // Calculate totals
            $totalDebit = array_reduce($journalData, function($sum, $item) {
                return $sum + ($item['debit'] != '-' ? $item['price'] : 0);
            }, 0);

            $totalKredit = array_reduce($journalData, function($sum, $item) {
                return $sum + ($item['credit'] != '-' ? $item['price'] : 0);
            }, 0);

            $balance = $totalDebit - $totalKredit;

            $response = [
                'status' => 'success',
                'data' => array_values($journalData),
                'totals' => [
                    'debit' => $totalDebit,
                    'kredit' => $totalKredit,
                    'balance' => $balance
                ]
            ];

            return response()->json($response);

        } catch (\Throwable $th) {
            $response = [
                'status' => 'error',
                'message' => $th->getMessage()
            ];

            return response()->json($response, 500);
        }
    }

    public function saveTransaction(Request $request)
    {
        try {
            DB::beginTransaction();

            $type = $request->input('type', 'expense');
            
            if ($type === 'expense') {
                DB::table('t_expenses')->insert([
                    'date' => $request->input('date'),
                    'category' => $request->input('account_debit'),
                    'detail' => $request->input('description'),
                    'price' => $request->input('amount'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } elseif ($type === 'subscription') {
                DB::table('t_subscriptions')->insert([
                    'category' => $request->input('category'),
                    'description' => $request->input('description'),
                    'valid_from' => $request->input('valid_from'),
                    'valid_to' => $request->input('valid_to'),
                    'price' => $request->input('amount'),
                    'remark' => $request->input('remark', ''),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Transaction saved successfully'
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function deleteTransaction(Request $request)
    {
        try {
            DB::beginTransaction();

            $id = $request->input('id');
            $parts = explode('_', $id);
            $type = $parts[0];

            if ($type === 'expense') {
                DB::table('t_expenses')->where('id', $parts[1])->delete();
            } elseif ($type === 'subscription') {
                DB::table('t_subscriptions')->where('id', $parts[1])->delete();
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Transaction deleted successfully'
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function saveSubscription(Request $request)
    {
        try {
            DB::beginTransaction();

            DB::table('t_subscriptions')->insert([
                'category' => $request->input('category'),
                'description' => $request->input('description'),
                'valid_from' => $request->input('valid_from'),
                'valid_to' => $request->input('valid_to'),
                'price' => $request->input('price'),
                'remark' => $request->input('remark', ''),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Subscription saved successfully'
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function deleteSubscription(Request $request)
    {
        try {
            DB::beginTransaction();

            DB::table('t_subscriptions')
                ->where('id', $request->input('id'))
                ->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Subscription deleted successfully'
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}

