@extends('backend.master')

@section('content')

<div class="container-fluid row shadow mb-4">
	<div class="col-lg-11">
		<h1 class="text-grey-800">Create Item</h1>
	</div>
	<div class="col-lg-1">
		<a href="{{route('items.index')}}"><button class="btn btn-primary active">Back</button></a>
	</div>
</div>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			@if($errors->any()){
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		}
			@endif
			<form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<div class="col-lg-2">
						<label for="codeno" class="form-label text-md-right">Codeno</label>
					</div>
					<div class="col-lg-10">
						<input type="number" name="codeno" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						<label class="form-label text-md-right" for="name">Name</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						<label for="photo" class="form-label text-md-right">Photo</label>
					</div>
					<div class="col-lg-10">
						<input type="file" name="photo" class="form-control-file">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						<label class="form-label text-md-right">Price</label>
					</div>
					<div class="col-lg-10">
						<input type="number" name="price" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						<label class="form-label text-md-right">Brand_id</label>
					</div>
					<div class="col-lg-10">
						<select class="custom-select form-control" name="brand_id">
							<option>Choose Brand</option>
							@foreach($brands as $brand)
							<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-2">
						<label class="form-label text-md-right">Subcategory_id</label>
					</div>
					<div class="col-lg-10">
						<select class="custom-select form-control" name="subcategory_id">
							<option>Choose Subctegory</option>
							@foreach($subcategories as $subcategory)
							<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group mb-0">
					<button class="btn btn-primary active" type="submit">Save</button>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection