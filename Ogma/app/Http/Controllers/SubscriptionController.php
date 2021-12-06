<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subscriber' => 'required|integer',
            'post' => 'required|integer',
        ]);

        Subscription::create([
            'subscriber' => $request->subscriber,
            'post' => $request->post,
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        Subscription::find($request->id)->delete();

        return redirect()->back();
    }
}
