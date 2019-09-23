@extends('layouts.app')
@section('title','customer')
@section('content')
<div class="row">
	<div class="card">
		<div class="card-body">
			<a href="{{ route('customers.create') }}" class="btn btn-primary">Add new customer</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="card" style="width: 100%">
		<div class="card-header"><h3>Customer List</h3></div>
		<div class="card-body">
			@if(Session::has('success'))
			<div class="alert alert-success alert-dismissible">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
			  {{ Session::get('success')}}
			</div>
			@endif
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th>image</th>
			      <th>Name</th>
			      <th>Email</th>
			      <th>mobile</th>
			      <th>status</th>
			      <th>company</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <tbody>
			      @foreach($customers as $customer)
				    <tr>
				    	<td>
				    		@if($customer->image)
				    		<img src="{{ asset('storage/' . $customer->image) }}" alt="" style="width:50px;height: 50px">
				    		@else
				    		<img src="{{ asset('storage/uploads/default.jpg') }}" alt="" style="width:50px;height: 50px">
				    		@endif
				    	</td>	
						<td>{{ $customer->name }}</td>
						<td>{{ $customer->email }}</td>
						<td>{{ $customer->mobile }}</td>
						<td>{{ $customer->status }}</td>
						<td>{{ $customer->company->name }}</td>
						<td>
			                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
			   
			                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
			    
			                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
			   
			                    @csrf
			                    @method('DELETE')
      
			                    <button type="submit" class="btn btn-danger">Delete</button>
			                </form>
			            </td>
				    </tr>
				  @endforeach
			  </tbody>
			</table>
			<div class="col-md-12">
				{{ $customers->links() }}
			</div>
		</div>
		<div class="card-footer"></div>
	</div>
	<div class="card" style="width: 50%;">
		<div class="card-header"><h3>Active Customer List</h3></div>
		<div class="card-body">
			<table class="table">
			  <thead class="bg-success text-white">
			    <tr>
			      <th>Name</th>
			      <th>Email</th>
			      <th>mobile</th>
			      <th>Company</th>
			    </tr>
			  </thead>
			  <tbody>
			      @foreach($activeCustomer as $activeCustomer)
				    <tr>	
						<td>{{ $activeCustomer->name }}</td>
						<td>{{ $activeCustomer->email}}</td>
						<td>{{ $activeCustomer->mobile}}</td>
						<td>{{ $customer->company->name }}</td>
				    </tr>
				  @endforeach
			  </tbody>
			</table>
		</div>
		<div class="card-footer"></div>
	</div>
	<div class="card" style="width: 50%">
		<div class="card-header"><h3>Inactive Customer List</h3></div>
		<div class="card-body">
			<table class="table">
			  <thead class="bg-danger text-white">
			    <tr>
			      <th>Name</th>
			      <th>Email</th>
			      <th>mobile</th>
			      <th>company</th>
			    </tr>
			  </thead>
			  <tbody>
			      @foreach($inactiveCustomer as $inactiveCustomer)
				    <tr>	
						<td>{{ $inactiveCustomer->name }}</td>
						<td>{{ $inactiveCustomer->email}}</td>
						<td>{{ $inactiveCustomer->mobile}}</td>
						<td>{{ $inactiveCustomer->company->name}}</td>
				    </tr>
				  @endforeach
			  </tbody>
			</table>
		</div>
		<div class="card-footer"></div>
	</div>
</div>
@endsection