<?php

namespace App\Services\ClientForm;

use App\Services\Consumer\CreateConsumer;
use App\Services\Submission\CreateSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreClientForm
{
    public function __construct(
        private CreateConsumer $createConsumer,
        private CreateSubmission $createSubmission
    ) {
    }

    public function execute(array $validated)
    {
        DB::beginTransaction();

        try {
            $consumer = $this->createConsumer->execute($validated);

            foreach ($validated['products'] as $product) {
                $this->createSubmission->execute($consumer->id, $product);
            }

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
        }
    }
}
