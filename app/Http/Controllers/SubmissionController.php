<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Services\Submission\GetSubmissions;
use Inertia\Inertia;

class SubmissionController extends Controller
{
    public function __construct(private GetSubmissions $getSubmissions)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Submission/List', [
            'submissions' => $this->getSubmissions->execute(),
        ]);
    }
}
