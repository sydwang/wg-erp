@extends('layouts.master')

@section('title', 'My Blog')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>

    
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
