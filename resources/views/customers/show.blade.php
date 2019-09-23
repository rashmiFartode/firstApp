@extends('layouts.app')
@section('title','Add customer')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show customers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        	<ul>
        		<li><b>Name:</b>{{$customer->name}}</li>
        		<li><b>email:</b>{{$customer->email}}</li>
        		<li><b>number:</b>{{$customer->mobile}}</li>
        		<li><b>status:</b>{{$customer->status}}</li>
        		<li><b>company:</b>{{$customer->company->name}}</li>

                @if($customer->image)
                <li><img src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-thumbnail"></li>
                @else
                <li><img src="{{ asset('storage/uploads/default.jpg' ) }}" alt="" class="img-thumbnail"></li>
                @endif
        	</ul>
        </div>
    </div>
@endsection
