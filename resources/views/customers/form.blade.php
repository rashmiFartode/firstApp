			<div class="form-group">
			    <label for="text">name</label>
			    <input type="text" class="form-control" id="text"  placeholder="Enter name" name="name" value="{{ old('name') ?? $customer->name }}">
			    <div class="text-danger">{{ $errors -> first('name') }}</div>
			  </div>

			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') ?? $customer->email }}">
			    <div class="text-danger">{{ $errors -> first('email') }}</div>
			  </div>
			  <div class="form-group">
			    <label for="mobile">mobile address</label>
			    <input type="mobile" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" value="{{ old('mobile') ?? $customer->mobile }}" maxlength="10" minlength="10">
			    <div class="text-danger">{{ $errors -> first('mobile') }}</div>

			  </div>
				<div class="form-group">
					<label for="status">status</label>
					<select id="status" class="form-control" name="status" >
						@foreach($customer->activeOptions() as $activeOptionKey =>$activeOptionValue)
							<option value="{{ $activeOptionKey }}" {{ $customer->status ==  $activeOptionValue ? 'selected' : '' }} >{{$activeOptionValue}}</option>
						@endforeach
					</select>
					<div class="text-danger">{{ $errors -> first('status') }}</div>
				</div>

				<div class="form-group">
					<label for="company_id">company</label>
					<select id="company_id" class="form-control" name="company_id" >
						<option value="" disabled selected>Select company...</option>
						@foreach($companies as $company)
						<option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected':'' }}>{{ $company->name }}</option>
						@endforeach
					</select>
					<div class="text-danger">{{ $errors -> first('company_id') }}</div>
				</div>

				<div class="form-group d-flex flex-column">
					<label for="image">Image</label>
					<input type="file" name="image" alt="" class="img-thumbnail">
				</div>
				<div class="text-danger">{{ $errors -> first('image') }}</div>
				@csrf