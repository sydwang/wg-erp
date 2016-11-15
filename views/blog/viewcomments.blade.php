@extends('layouts.master')

@section('title', 'blog view')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
    <article>
		<h1>{{ $post->title}}</h1>
		
		<div> 

		<!--  Finally I find that the following codes are unable to run as expectation -->
		<!--  Refer to view.blade.php  -->
		comments should be displayed as below:
			<?php $comment = App\Comment::where('post_id',$post->id)->get(); ?>
			<p> {{ App\Comment::where('post_id',$post->id)->first() }} </p>
			<p>{{ $post->context }}</p>
			<p>{{$comment->get('name')}}</p>
		</div>

    </article>

   
   <!-- write a new post here
   	<form action = "{{URL::route('createPost') }}" method="POST">
	<div class="form-group">  
		<input name="title" class="form-control" type="text"  placeholder="Title" />
	
	</div>
	
	<input type="hidden" name="_token"         value="{!! csrf_token() !!}"/>
	
	<div class="group">
		<textarea name="content" class="form-control" placeholder="Write here..."></textarea>
	</div>

		<input type="submit" class="btn btn-primary" />
	</form>
   write a new post here -->

@endsection
