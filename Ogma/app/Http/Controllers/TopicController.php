<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Topic::create([
            'name' => $request->name,
        ]);
        return redirect()->route('control');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $newsArticle = Topic::find($request->id);
        $newsArticle->delete();
        return redirect()->route('control');
    }
}
