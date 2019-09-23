@extends('layouts.app')
@section('title','contact')
@section('content')
<h1>contact</h1>
<p>this is contact page</p>
	<form action="/contact" method="post">
		@csrf
		<div class="form-group">
		    <label for="text">name</label>
		    <input type="text" class="form-control" id="text" placeholder="Enter name" name="name" value="{{ old('name') }}">
		    <div class="text-danger">{{ $errors->first('name') }}</div>
		</div>

		<div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email')}}">
		    <div class="text-danger">{{ $errors->first('email') }}</div>
		</div>

		<div class="form-group">
		    <label for="message">message address</label>
		    <textarea class="form-control" id="message" placeholder="Enter message" name="message" rows="5" column="5"> {{ old('message')}}</textarea> 
		    <div class="text-danger">{{ $errors->first('message') }}</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection