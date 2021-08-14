@extends('backend.master')

@section('content')

<div class="row shadow mb-4 container-fluid">
	<div class="col-lg-11">
		<h1 class="text-grey-800">Create Brand</h1>
	</div>
	<div>
		<a href="{{route('brands.index')}}"><button class="btn btn-primary" type="button">Back</button></a>
	</div>
</div>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			@if ($errors->any())
				<div class="alart alart-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form method="post" action="{{route('brands.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="from-group row">
					<div class="col-lg-2">
						<label class="form-label text-md-right" for="name">Name</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="name" class="form-control">
					</div>
				</div>
				<div class="from-group row">
					<div class="col-lg-2">
						<label class="form-label text-md-right" for="logo">Logo</label>
					</div>
					<div class="col-lg-10">
						<input type="file" name="logo" class="form-control-file">
					</div>
				</div>

				<div class="from-group mb-0">
					<button class="btn btn-primary" type="submit">Save</button>
				</div>
				
			</form>
		</div>
	</div>
</div>

@endsection