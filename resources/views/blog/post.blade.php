@extends('layout')

@section('title', $post_content->title)

@section('content')

    <section class="post">
        <h1><?php echo $post_content->title; ?></h1>
        <?php echo $post_content->body(); ?>
    </section>

@endsection
