<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class StoreController extends Controller {
    public function __invoke(Post $post) {
        auth()->user()->likedPosts()->toggle($post->id);
        $data['isLiked'] = auth()->user()->likedPosts->contains($post->id);
        $data['likesCount'] = $post->refresh()->liked_users_count;
        return $data;
    }
}
