<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function show(Tweet $tweet){
        return view('tweets.show', [
            'tweet' => $tweet
        ]);
    }
    public function store() {

        //vallidation: cheking if the post is nothing
        request()->validate([
            'tweets' => 'required|min:5|max:240' // parameteers for a post, you are redirected but no success message.
        ]);
        // for more validation option, laravel validation: for example to validate json
        // include in the above comment '|json'

        $tweet = Tweet::create(
            [
                'content' => request()->get('idea', ''),
            ]
        );

        return redirect()->route('dashboard')->with('success','Idea created successfully!'); // with pass one time things that is gone after
    }

    public function destroy(Tweet $tweet) {
        $tweet->delete();

        return redirect()->route('dashboard')->with('success','Idea deketed successfully!'); // with pass one time things that is gone after
    }
}
