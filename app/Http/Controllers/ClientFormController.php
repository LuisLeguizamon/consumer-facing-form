<?php

namespace App\Http\Controllers;

use App\Services\InsuranceProduct\GetInsuranceProducts;
use Inertia\Inertia;

class ClientFormController extends Controller
{
    public function __construct(
        private GetInsuranceProducts $getInsuranceProducts,
    )
    {}

    public function index()
    {
        return Inertia::render('ClientForm/ClientForm', [
            'products' => $this->getInsuranceProducts->execute(),
        ]);
    }
}
