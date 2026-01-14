<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class ClientController extends Controller
{
    public function index()
    {
        $title = 'Clients';

        return view('clients.index', [
            'title' => $title
        ]);
    }


    public function indexCreate()
    {
        $title = 'Tambah Client';

        return view('clients.add_clients', [
            'title' => $title
        ]);
    }    
}
