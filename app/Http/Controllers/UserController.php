<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $title = 'Users';

        $users = DB::table('users')->get();

        return view('auth.index_users', [
            'title' => $title,
            'users' => $users
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();                

        try {
            DB::beginTransaction();

            foreach ($data['data'] as $row) {
                $userData = [
                    'username' => $row[0],
                    'name' => $row[2],
                    'phone' => $row[3],
                    'email' => $row[4],
                    'role_code' => $row[5],
                ];

                // Update password only if a new password is provided
                if (!empty($row[1])) {
                    $userData['password'] = bcrypt($row[1]);
                }

                DB::table('users')->updateOrInsert(
                    ['username' => $row[0]], // Unique key to check
                    $userData
                );
            }

            DB::commit();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
