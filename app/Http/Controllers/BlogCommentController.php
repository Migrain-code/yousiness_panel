<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = BlogComment::find($request->input('id'));
        if ($comment->status == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }

        if ($comment->save()) {
            return response()->json([
                'status' => 'success',
                'message' => $comment->status == 1 ? "Kommentar veröffentlicht" : "Kommentar aus der Veröffentlichung entfernt",
            ]);
        }
    }

    public function edit($blogComment)
    {
        $comment = BlogComment::find($blogComment);
        return view('admin.blog-comment.edit', compact('comment'));
    }

    public function update(Request $request, $blogComment)
    {
        $comment = BlogComment::find($blogComment);
        $comment->comment = $request->input('comment');
        if ($comment->save()) {
            return to_route('admin.blog.edit', $comment->blog_id)->with('response', [
                'status' => "success",
                'message' => "Kommentar aktualisiert"
            ]);
        }

    }


    public function destroy($blogComment)
    {
        $comment = BlogComment::find($blogComment);
        if ($comment->delete()) {
            return response()->json([
                'status' => "success",
                'message' => "Kommentar gelöscht"
            ]);
        }
    }
}
