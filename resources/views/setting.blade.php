@extends('layouts.app')

@section('content')
	<div class='card col-sm-6 offset-md-3'>
		<div class='card-header'>Setting </div>
		<div class='card-content'></div><br>
			<form class='form-group' action='{{route("users.update",["id"=> auth()->user()->id])}}' method="post">
				@csrf
				@method('put')
				<div class='form-group row'>
				<label for='name' class='col-sm-2 col-form-label'>Name</label>
					<div class="col-sm-6 ">
					<input class="form-control {{$errors->has('name') ? 'is-invalid' :''}} " type="text" name="name" value="{{ auth()->user()->name }}" >

					@error('name')
					 <span class="invalid-feedback" role="alert">
					 	
					 	<div class="alert alert-danger"> <strong>{{ $message }}</strong></div>
					 	</span>
					 @enderror
					</div>
				</div>
					<div class="form-group row" >
					<label for='email' class='col-sm-2 col-form-label'>Email</label>
					<div class='col-sm-6'>
					<input class="form-control {{$errors->has('eamil') ? 'is-invalid' :''}} " type="text" name="email" value="{{auth()->user()->email }}"  >
						@error('email')
    				 <span class="invalid-feedback" role="alert">
					 	
					 	
					 	</span>
					 	<div class="alert alert-danger"> <strong>{{ $message }}</strong></div>
					@enderror
					</div>

				</div>
				
				<button class='btn btn-primary btn-lg  col-sm-8 offset-sm-1 ' style="font-size: 20px;">Submit</button>
			</form>
		</div>

	</div>
@endsection