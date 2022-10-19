<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function find($post) {
        $file_name = __DIR__ . '/../../resources/posts/' . $post . '.html';

        if(!file_exists($file_name)) {
            return abort(404);
        }

        $post_content = file_get_contents($file_name);
        return view('blog.post', ['post_content' => $post_content]);
    }

}
