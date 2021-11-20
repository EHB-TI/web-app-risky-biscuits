<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use DateTime;
use Illuminate\Http\Request;

class CommentController extends Controller
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
           'message' => "required|string",
           'author' => 'required|integer',
           'post' => 'required|integer',
       ]);

       Comment::create([
           'message' =>  $request->message,
           'author' => $request->author,
           'post' => $request->post,
           'dateOfPublication' => new DateTime()   
       ]);

       return redirect()->back();
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Comment  $comment
    * @return \Illuminate\Http\Response
    */
   public function destroy(Request $request)
   {
       $request->validate([
           'id' => 'required|integer'
       ]);

       Comment::find($request->id)->delete();

       return redirect()->back();
   }
}
