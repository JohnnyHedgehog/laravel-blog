<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;

class IndexController extends Controller {
    public function __invoke(Post $post) {
        $data['commentsCount'] = $post->comments->count();
        $data['comments'] = $post->comments;

        // Форматируем данные и убираем лишние
        foreach ($data['comments'] as $key => $comment) {
            $data['comments'][$key]['userName'] = $comment->user->name;
            $data['comments'][$key]['date'] = Carbon::parse($comment->created_at)->translatedFormat('d F Y в H:i');
            unset($data['comments'][$key]['user']);
            unset($data['comments'][$key]['post_id']);
            unset($data['comments'][$key]['created_at']);
            unset($data['comments'][$key]['updated_at']);
        }

        return $data;
    }
}
