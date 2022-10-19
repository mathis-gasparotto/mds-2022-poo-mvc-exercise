<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostController extends Controller
{
    public function show($post)
    {
        $file_name = resource_path('/posts/' . $post . '.html');

        if(!file_exists($file_name)) {
            // return abort(404);
            throw new ModelNotFoundException();
        }

        $post_content = YamlFrontMatter::parse(file_get_contents($file_name));
        return view('blog.post', ['post_content' => $post_content]);
    }

    public function list()
    {
        $posts = File::allFiles(__DIR__ . '/../../../resources/posts');
        $posts_content = array_map(function ($post) {
            return YamlFrontMatter::parse(file_get_contents($post->getPathname()));
        }, $posts);

        return view('blog.posts', ['posts_content' => $posts_content]);
    }
}
