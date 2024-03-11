<?php

namespace App\Services\Consumer;

use App\Models\Consumer;

class CreateConsumer
{
    public function execute(array $validated): Consumer
    {
        $consumer = new Consumer();
        $consumer->first_name = $validated['first_name'];
        $consumer->last_name = $validated['last_name'];
        $consumer->email = $validated['email'];
        $consumer->phone = $validated['phone'];
        $consumer->contact_preference = $validated['contact_preference'];
        $consumer->street_address = $validated['street_address'];
        $consumer->ste_apt = $validated['ste_apt'];
        $consumer->city = $validated['city'];
        $consumer->state = $validated['state'];
        $consumer->zip_code = $validated['zip_code'];

        $consumer->save();

        return $consumer;
    }
}
