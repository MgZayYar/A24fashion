@extends('backend.master')

@section('content')

<div class="container-fluid shadow mb-4 row" >
	<div class="col-lg-11">
		<h1 class="text-grey-800 ">Edit Brand</h1>
	</div>
	<div class="col-lg-1">
		<a href="{{route('brands.index')}}"><button class="btn btn-primary ">Back</button></a>
	</div>
</div>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

			<form method="post" action="{{route('brands.update',$brands->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group row">
					<div class="col-lg-2">
						<label class="form-label text-mid-right" for="name">Name</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="name" class="form-control" value="{{$brands->name}} " >
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						<label class="form-label text-mid-right" for="photo">Photo</label>
					</div>
					<div class="col-lg-10">
						<ul class="nav nav-tabs">
							<li class="nav-item" >
								<a href="#old" class="nav-link" data-toggle="tab">Old</a>
							</li>	
							<li class="nav-item" >
								<a href="#new" class="nav-link" data-toggle="tab">New</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane fade show active" id="old">
								<img src="{{asset($brands->logo)}} " class="img-fluid w-25">
								<input type="hidden" name="oldphoto" value="{{$brands->logo}} ">
							</div>

							<div class="tab-pane " id="new" >
								<input type="file" name="logo" class="form-control-file" id="inputPhoto" accept="image/*" >
							</div>
						</div>

					</div>
				</div>
				<div class="form-group mb-0">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
				
			</form>
			
		</div>
		
	</div>
</div>

@endsection