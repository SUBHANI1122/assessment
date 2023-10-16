<?php

namespace App\Http\Controllers;

use App\Models\FeedbackCategory;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackCategoryValidationRequest;

class FeedbackCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FeedbackCategory::all();
        return view('feedback_category.index', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackCategoryValidationRequest $request)
    {
        $feedback_category = new FeedbackCategory($request->all());
        $feedback_category->save();
        return redirect()->route('feedback_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedbackCategory  $feedbackCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FeedbackCategory $feedbackCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeedbackCategory  $feedbackCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedbackCategory $feedbackCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeedbackCategory  $feedbackCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedbackCategory $feedbackCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedbackCategory  $feedbackCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedbackCategory $feedbackCategory)
    {
        //
    }
}
