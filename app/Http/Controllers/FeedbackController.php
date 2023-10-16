<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackCategory; 
use App\Models\FeedbackVote;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackValidationRequest;
use Auth;
use App\Jobs\SendVoteEmail;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_feedbacks = Feedback::where('user_id', Auth::user()->id)->get();
        return view('feedback.index', ['my_feedbacks'=> $my_feedbacks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FeedbackCategory::all();
        return view('feedback.create', ['categories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackValidationRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $feedback = new Feedback($inputs);
        $feedback->save();
        return redirect('/home');
    }

    public function voteFeedback(Request $request){
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['feedback_id'] = $request->feedbackId;
        $inputs['vote'] = $request->value;
        $feedbackVote = new FeedbackVote($inputs);
        $feedbackVote->save();

        SendVoteEmail::dispatch($inputs); 

        return response()->json(['success' => 'Your Vote Submitted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        return view('feedback.detail', ['feedback' => $feedback]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
