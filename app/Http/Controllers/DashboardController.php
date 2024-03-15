<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class DashboardController extends Controller
{

    public function index() {
        $tweets = Tweet::orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $tweets = $tweets->where('content', 'like', '%'.request()->get('search', '') . '%');
        }

        return view('dashboard', [
            'tweets' => Tweet::orderBy('created_at', 'DESC')->paginate(5), // get all of the model from database
            // max 5
        ]);
    }
}
