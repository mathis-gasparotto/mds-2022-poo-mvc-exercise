@extends('layout')

@section('title', 'All Posts')

@section('content')

    <section class="posts">
        <?php foreach ($posts_content as $post_content) {
            echo '<h1><a href="' . route("blog.post", $post_content->id) . '">' . $post_content->title . '</a></h1>';
            echo $post_content->body();
        } ?>
    </section>


@endsection
