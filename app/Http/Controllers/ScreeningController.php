<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screening;
use App\Http\Requests\AddScreeningRequest;
use Illuminate\Http\RedirectResponse;

class ScreeningController extends Controller
{
    /**
     * render screening form 
     */
    public function getScreeningForm() 
    {
        return view('welcome', ['statuses' => Screening::STATUSES, 'frequencies' => Screening::FREQUENCIES]);
    }

    /**
     * add Screening Details to db and show valid message
     */
    public function addScreening(AddScreeningRequest $request)
    {
        $validated = $request->validated();
        Screening::create($validated);
        $message = "Candidate ".$validated['first_name']." is assigned to Cohort ";
        if ($validated['status'] == Screening::STATUSES[2]) {
            $message .= 'B.'; 
        } else {
            $message .= 'A.'; 
        }
        return back()->with('success', $message);
    }
}
