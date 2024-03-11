<?php

namespace App\Services\Submission;

use App\Models\Submission;

class GetSubmissions
{
    public function execute()
    {
       return Submission::with('consumer')->get();
    }
}