<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function index()
    {
        return view('devis.index', [
        ]);
    }

    public function store(Request $request)
    {
        $devis = new Devis;

        $devis->email = $request->input('email');
        $devis->firstname = $request->input('firstname');
        $devis->lastname = $request->input('lastname');
        $devis->phone = $request->input('phone');
        if ($request->input('situation'))
            $devis->situation = $request->input('situation');
        $devis->prestation = $request->input('prestation');
        $devis->pages = $request->input('pages');

        $devis->save();

        return response()->json([
            'status' => 200,
            'message' => 'Devis saved',
        ]);
    }
}
