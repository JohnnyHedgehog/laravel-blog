<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    protected $withCount = ['likedUsers'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedUsers() {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    // Данный метод возвращает сразу фразу в нужном склонении с количеством комментариев поста
    // Используется в шаблоне post.show
    public function getCommentsCountAttribute() {
        $comments = $this->comments->count();
        if ($comments % 10 == 1) {
            $word = ' комментарий';
        } else if ($comments % 10 >= 2 && $comments % 10 <= 4) {
            $word = ' комментария';
        } else {
            $word = ' комментариев';
        }
        $commentsCount = $comments . $word;
        return $commentsCount;
    }
}
