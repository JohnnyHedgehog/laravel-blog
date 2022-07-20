<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = false;

    public function posts() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }


    // Данный метод возвращает сразу фразу в нужном склонении с количеством постов для страницы категорий
    // Используется в шаблоне category.index
    public function getPostsCountAttribute() {
        $posts = $this->posts()->count();
        if ($posts  % 10 == 1) {
            $word = ' пост';
        } else if (($posts  % 10 >= 2 && $posts  % 10 <= 4) && ($posts % 100 < 10 || $posts % 100 > 20)) {
            $word = ' поста';
        } else {
            $word = ' постов';
        }
        $postsCount = $posts . $word;
        return $postsCount;
    }
}
