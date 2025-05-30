<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index()
    {
        $departments = \App\Models\Department::all();

        return view('feedback.index',[
            'departments' => $departments,
        ]);
    }

    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();

        $feedback = Feedback::create($data);

        Mail::to($feedback->email)->send(new \App\Mail\Feedback($feedback));

        return redirect()->route('feedback',['locale'=>app()->getLocale()])->with('success', 'Хабарлама жіберілді');
    }
}
