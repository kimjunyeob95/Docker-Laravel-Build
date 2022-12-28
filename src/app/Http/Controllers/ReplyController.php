<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function create(Request $request,$id)
    {
        $reply = new Reply;
        $reply->post_id = $id;
        $reply->user_id = auth()->user()->id;
        $reply->reply = $request->reply;
        $reply->save();
        return redirect("/forum/view/{$id}");
    }
}
