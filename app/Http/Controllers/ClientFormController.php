<?php

namespace App\Http\Controllers;

use App\Enums\InsuranceProduct;
use Inertia\Inertia;

class ClientFormController extends Controller
{
    public function index()
    {
        return Inertia::render('ClientForm', [
            'products' => InsuranceProduct::toArray(),
        ]);
    }
}
