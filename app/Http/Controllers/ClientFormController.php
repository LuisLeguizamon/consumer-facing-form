<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFormStoreRequest;
use App\Services\ClientForm\StoreClientForm;
use App\Services\InsuranceProduct\GetInsuranceProducts;
use Inertia\Inertia;

class ClientFormController extends Controller
{
    public function __construct(
        private GetInsuranceProducts $getInsuranceProducts,
        private StoreClientForm $storeClientForm,
    )
    {}

    public function index()
    {
        return Inertia::render('ClientForm/ClientForm', [
            'products' => $this->getInsuranceProducts->execute(),
        ]);
    }

    public function store(ClientFormStoreRequest $request)
    {
        $this->storeClientForm->execute($request->validated());

        return redirect()->route('client_form.confirmation');
    }

    public function confirmation()
    {
        return Inertia::render('ClientForm/Partials/Confirmation');
    }
}
