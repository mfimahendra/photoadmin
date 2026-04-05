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

            // example data
            // $data = [
            //     ['month' => 'yyyy-mm-01', 'category' => 'Revenue', 'amount' => 3000],
            //     ['month' => 'yyyy-mm-01', 'category' => 'Cost of Services', 'detail' => 'Fee FG', 'amount' => 3000],
            //     ['month' => 'yyyy-mm-01', 'category' => 'Cost of Services', 'detail' => 'Cetak', 'amount' => 3000],
            //     ['month' => 'yyyy-mm-01', 'category' => 'Operating Expenses', 'detail' => 'Admin', 'amount' => 3000],
            //     ['month' => 'yyyy-mm-01', 'category' => 'Operating Expenses', 'detail' => 'Editor', 'amount' => 3000],
            //     ['month' => 'yyyy-mm-01', 'category' => 'Operating Expenses', 'detail' => 'Equipment', 'amount' => 3000],
            //     ['month' => 'yyyy-mm-01', 'category' => 'Marketing Expenses', 'detail' => 'Ads', 'amount' => 3000],
            //     ['month' => 'yyyy-mm-01', 'category' => 'Other Expenses', 'detail' => 'Service', 'amount' => 3000],
            // ];

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
        

            // gather expenses data

            $financial_data = array_merge($revenueData); // add more data sources as needed


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
}
