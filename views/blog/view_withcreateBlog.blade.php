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
		<!--
		<div>
		{{ $post->context}}
		</div>
		-->

		{{ $post->context}}

		<hr/>

		@foreach($post->comments as $comment)
		<p>	{{ $comment->name }} says: </p>
		<p> {{ $comment->content }} </p>
		@endforeach

		<section>
			<h3> Add a comment </h3>
			<form action="{{URL::route('createComment',['id' => $post->id ] )}}" method="POST">
			<div>
			<input type="text" name="name" placeholder="Your name"/>
			</div>

			<div>
			<textarea name="content" placeholder="Write here..."></textarea>
			</div>
			
			<input type="submit" />
			</form>
 		</section>

		<footer>
		<p> Posted {{ $post->created_at->diffForHumans()}}</p>
		</footer>
    </article>

   
   <!-- write a new post here -->
   	<form action = "{{URL::route('createPost') }}" method="POST">
	<div class="form-group">  
		<input name="title" class="form-control" type="text"  placeholder="Title" />
	
	</div>
	
	<!--  This input is a must while using post method	-->
	<input type="hidden" name="_token"         value="{!! csrf_token() !!}"/>
	
	<div class="group">
		<textarea name="content" class="form-control" placeholder="Write here..."></textarea>
	</div>

		<input type="submit" class="btn btn-primary" />
	</form>

@endsection
