<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function show(Tweet $tweet){
        return view('tweets.show', compact('tweet'));
    }

    public function edit(Tweet $tweet)
    {
        $editing = true;

        return view('tweets.show', compact('tweet', 'editing'));
    }

    public function update(Tweet $tweet){
        request()->validate([
            'content' => 'required|min:5|max:240' // parameteers for a post, you are redirected but no success message.
        ]);

        $tweet->content = request()->get('content','');
        $tweet->save();

        return redirect()->route('tweets.show', $tweet->id)->with('success','Idea Updated Successfully!');
    }

    public function store() {

        //vallidation: cheking if the post is nothing
        request()->validate([
            'content' => 'required|min:5|max:240' // parameteers for a post, you are redirected but no success message.
        ]);
        // for more validation option, laravel validation: for example to validate json
        // include in the above comment '|json'

        $tweet = Tweet::create(
            [
                'content' => request()->get('content', ''),
            ]
        );

        session()->flash('success','Tweet created successfully!'); // with pass one time things that is gone after

        return redirect()->route('dashboard')->with('success','Tweet created successfully!'); // with pass one time things that is gone after
    }

    public function destroy(Tweet $tweet) {
        $tweet->delete();

        return redirect()->route('dashboard')->with('success','Idea deleted successfully!'); // with pass one time things that is gone after
    }
}
