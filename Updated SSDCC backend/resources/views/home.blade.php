<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.8 Form Validation Example - W3Adda</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<h2>Laravel 5.8 Form Validation Example - W3Adda</h2>
	<form method="POST" action="{{url('laravel-form-validation-example')}}" autocomplete="off">
		
		@if ($errors->any())
		    <div class="alert alert-danger">
		    	<strong>Whoops!</strong> Please correct errors and try again!.
						<br/>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<!-- CSRF Token -->
		@csrf
		<div class="row">
			<div class="col-md-6">
				<div class="form-group @error('firstname') has-error @enderror">
					<label for="firstname">First Name:</label>
					<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter First Name" value="{{ old('firstname') }}">
					@error('firstname')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group @error('lastname') has-error @enderror">
					<label for="lastname">Last Name:</label>
					<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter Last Name" value="{{ old('lastname') }}">
					@error('lastname')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group @error('email') has-error @enderror">
					<label for="email">Email:</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
					@error('email')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group @error('phone') has-error @enderror">
					<label for="mobileno">Phone No:</label>
					<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Mobile No" value="{{ old('phone') }}">
					@error('phone')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group @error('password') has-error @enderror">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" >
					@error('password')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group @error('confirm_password') has-error @enderror">
					<label for="confirm_password">Confirm Password:</label>
					<input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter Confirm Passowrd">
					@error('confirm_password')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
		</div>

		<div class="form-group">
			<button class="btn btn-success">Submit</button>
		</div>
	</form>
</div>
</body>
</html>
