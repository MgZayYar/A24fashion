@extends('backend.master')

@section('content')

<div class="row shadow mb-4 container-fluid">
	<div class="col-lg-11">
		<h1 class="h1 mb-2 text-gray-800">Subcategory</h1>
	</div>
	<div class="col-lg-1">
		<a href="{{route('subcategories.create')}}"><button class="btn btn-primary active" type="button">AddNew</button></a>
	</div>
</div>

<div class="card-table">
	<div class="table-responsive">
		<table cellspacing="0" cellpadding="10" border="1" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Category_id</th>
					<th>Actions</th>
				</tr>
			</thead>

			<tbody>
				@php $i=1 @endphp
				@foreach($subcategories as $row)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$row->name}}</td>
					<td>
						{{$row->category->name}}
					</td>
					<td >
						<div class="row">
						<a href="{{route('subcategories.edit',$row->id)}} "  class="btn btn-warning" >Edit</a>
 
						<form method="post" action="{{route('subcategories.destroy',$row->id)}} " onsubmit="return confirm('Are you sure?')">
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
					<th>Category_id</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

@endsection