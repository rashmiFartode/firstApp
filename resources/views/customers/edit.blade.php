@extends('layouts.app')
@section('title','Add customer')
@section('content')
<div class="row">
<div class="card mr-3" style="width:100%">
		<div class="card-header"><h3>Add customer</h3></div>
		<div class="card-body">
			<form action="{{ route('customers.update', $customer->id) }}" method="post"  enctype="multipart/form-data">
				@method('PATCH')
			  @include('customers.form')
				
			  <button type="submit" class="btn btn-primary">Submit</button>
			  	<a href="{{ route('customers.index') }}" class="btn btn-success">Back</a>
			</form>
		</div>
	</div>
@endsection
