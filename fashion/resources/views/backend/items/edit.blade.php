@extends('backend.master');

@section('content')
<div class="row shadow mb-4 container-fluid">
	<div class="col-lg-11">
		<h1 class="h3 mb-2 text-gray-800">Edit Item</h1>
	</div>
	<div class=" col-lg-1 pl-5 ">            
		<a href="{{route('items.index')}} "> <button type="button" class="btn btn-primary active">Back</button></a>
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
			<form method="post" action="{{route('items.update',$item->id)}}" enctype="multipart/form-data">
				@csrf 
				@method('PUT')

				<div class="form-group row">
							<div class="col-lg-2">
								<label for="name" class="form-label text-md-right">Name</label>
							</div> 
							<div class="col-lg-10">
								<input type="text" name="name" id="name" class="form-control"  required="required" value="{{$item->name}}">
							</div>
						</div>
						<div class="form-group row">
						<div class="col-lg-2">
							<label for="name" class="form-label text-md-right">Codeno</label>
						</div> 
						<div class="col-lg-10">
							<input type="text" name="codeno" id="codeno" class="form-control"  required="required" value="{{$item->codeno}}">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label for="name" class="form-label text-md-right">Photo</label>
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
									<img src="{{asset($item->photo)}} " class="img-fluid w-25">
									<input type="hidden" name="oldphoto" value="{{$item->photo}} ">
								</div>

								<div class="tab-pane " id="new" >
									<input type="file" name="photo" class="form-control-file" id="inputPhoto" accept="image/*" >
								</div>
							</div>

		</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label for="name" class="form-label text-md-right">Price</label>
						</div> 
						<div class="col-lg-10">
							<input type="text" name="price" id="price" class="form-control"  required="required" value="{{$item->price}}">
						</div>
					</div>

				<div class="form-group row">		
					<label for="subcategoryName" class="col-sm-2 col-form-label">Subcategory </label>		
					<div class=" col-sm-10">
						<select class="custom-select form-control" name="subcategory_id" id="subcategory_id">
							<option selected>Choose Subategory</option>

							@foreach ($subcategories as $subcategory)
							<option value="{{$subcategory->id}}"
								@if($item->subcategory_id==$subcategory->id)
								{{'selected'}} @endif
								>
								{{ $subcategory->name }} </option>               
								@endforeach

							</select>	
						</div>		
					</div>
					<div class="form-group row">		
						<label for="brandName" class="col-sm-2 col-form-label">Brand </label>		
						<div class=" col-sm-10">
							<select class="custom-select form-control" name="brand_id" id="brand_id">
								<option selected>Choose Brand</option>

								@foreach ($brands as $brand)
								<option value="{{$brand->id}}" 
									@if($item->brand_id==$brand->id)
									{{'selected'}} @endif
									>
									{{ $brand->name }} </option>               
									@endforeach

								</select>	
							</div>		
						</div>
					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary">Save </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endsection