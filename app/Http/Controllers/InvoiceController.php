<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('invoice.index', [
            'user' => $user,
        ]);
    }
}
