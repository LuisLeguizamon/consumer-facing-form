<?php

namespace App\Services\Submission;

use App\Models\Submission;

class CreateSubmission
{
    public function execute($consumerId, $insuranceProduct)
    {
        $submission = new Submission();
        $submission->consumer_id = $consumerId;
        $submission->insurance_product = $insuranceProduct;

        $submission->save();
    }
}
