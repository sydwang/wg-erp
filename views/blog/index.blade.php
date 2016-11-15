@extends('layouts.master')

@section('title', 'my blogs')


@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>

    @foreach ($posts as $post)

    	<h3><a href = "{{ URL::route('viewPost', ['id' => $post->id])}}">{{$post->title}}</a></h3>  	
    	<p>{{$post->context}}</p>


 		<div  style="font-size:10px" > 
		<p> Posted {{ $post->created_at->diffForHumans()}}</p>

		<?php if ($post->getNumComments() == 0 )
				{ ?>
				<p>{{ $post->getNumComments()}}</p> 
				<?php } 
			else  { ?>
				<p><a href = "{{ URL::route('viewPost', ['id' => $post->id])}}">{{ $post->getNumComments()}}</a></p>
				<?php } ?>
		</div>
  


    @endforeach

    
@endsection
