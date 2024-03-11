<?php

namespace App\Services\Submission;

use App\Models\Submission;

class GetSubmissions
{
    public function execute()
    {
        $submissions = Submission::with('consumer')->get();

        $submissions->each(function ($submission) {
            $submission->append('created_at_format');
            $submission->append('insurance_product_format');
            $submission->consumer->append('full_name');
        });

        return $submissions;
    }
}
