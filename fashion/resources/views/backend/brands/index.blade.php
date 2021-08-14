@extends('backend.master')

@section('content')

<div class="container-fluid shadow mb-4 row">
	<div class="col-lg-11">
		<h1 class="h1 text-grey-800 ">Brand</h1>
	</div>
	<div class="col-lg-1">
		<a href="{{route('brands.create')}}"><button class="btn btn-primary active" type="button">AddNew</button></a>
	</div>
</div>

<div class="card container-fluid">
	<div class="row shadow mb-4">
		<table border="1" cellpadding="10" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($brands as $brand)
				<tr>
					<td>{{$i++}}</td>
					<td> {{$brand->name}}</td>
					<td>
						<img src="{{asset($brand->logo)}}" class="img-fluid" width="100" height="100">
					</td>
					<td>
						<div class="row">
						<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning">Edit</a>
						<form method="post" action="{{route('brands.destroy',$brand->id)}} " onsubmit="return confirm('Are you sure?')">
							@csrf
							@method('DELETE')
							<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
						</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Action</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

@endsection