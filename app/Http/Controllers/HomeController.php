<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $feedbacks = Feedback::when($keyword, function ($query, $keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })->paginate(10);
        
        return view('home', ['feedbacks'=> $feedbacks]);
    }
}
