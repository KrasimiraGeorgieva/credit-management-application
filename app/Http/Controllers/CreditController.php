<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditRequest;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('credits.create');

    }

    public function store(StoreCreditRequest $request)
    {
        //
    }
}
