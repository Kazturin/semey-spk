<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\RequestRequest;
use App\Models\Feedback;
use App\Models\Page;
use App\Models\Request;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function index(string $locale, Page $page)
    {
    //    dd($page);

        if(!$page->exists){
            abort(404);
        }
        $departments = \App\Models\Department::all();

        return view('request.index',[
            'departments' => $departments,
            'page' => $page,
        ]);
    }

    public function store(RequestRequest $request)
    {
        $data = $request->validated();

        $requestModel = Request::create($data);

        if($requestModel->department){
            Mail::to($requestModel->department->email)->send(new \App\Mail\Request($requestModel, $request->file('filename')));
        }

        return back()->with('success', 'Өтініш жіберілді');
    }
}
