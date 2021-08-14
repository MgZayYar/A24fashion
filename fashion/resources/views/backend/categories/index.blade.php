@extends('backend.master')

@section('content')

<div class="row shadow  mb-4 container-fluid">
	<div class="col-lg-11">
		<h1 class="h3 mb-2 text-gray-800">Create Category</h1>
	</div>
	<div class=" col-lg-1 ">            
		<a href="{{route('categories.create')}} "> <button type="button" class="btn btn-primary active">AddNew</button></a>
	</div>
</div>
<div class="card-table">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
		@php $i=1; @endphp

		@foreach($categories as $row)
		<tr>
			<td>{{$i++}} </td>
			<td>{{$row->name}}</td>
			<td>
				<img src="{{asset($row->photo)}}" class="img-fluid " width="100" height="100">
			</td>
			
			<td class="row">
			<a href="{{route('categories.edit',$row->id)}} " style="display: inline-block;" class="btn btn-warning" >Edit</a>

			<form method="post" action="{{route('categories.destroy',$row->id)}} " onsubmit="return confirm('Are you sure?')">
				@csrf
				@method('DELETE')
				<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
			</form>

			</td>
		</tr>
		@endforeach
	</tbody>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

@endsection