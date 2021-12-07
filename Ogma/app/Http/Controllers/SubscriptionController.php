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
        Subscription::where('post', $request->post)->where('subscriber', $request->subscriber)->delete();

        return redirect()->back();
    }
}
