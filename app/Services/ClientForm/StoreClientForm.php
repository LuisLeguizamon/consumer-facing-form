<?php

namespace App\Services\ClientForm;

use App\Services\Consumer\CreateConsumer;
use App\Services\Submission\CreateSubmission;

class StoreClientForm
{
    public function __construct(
        private CreateConsumer $createConsumer,
        private CreateSubmission $createSubmission
    )
    {}

    public function execute(array $validated)
    {
        $consumer = $this->createConsumer->execute($validated);

        foreach ($validated['products'] as $product) {
            $this->createSubmission->execute($consumer->id, $product);
        }
    }
}
