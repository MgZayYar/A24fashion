@extends('backend.master')

@section('content')

<div class="row shadow mb-4 container-fluid">
	<div class="col-lg-11">
		<h1 class="text-grey-800">Items</h1>
	</div>
	<div>
		<a href="{{route('items.create')}}"><button class="btn btn-primary" type="button">AddNew</button></a>
	</div>
</div>
<div class="container-fluid card">
	<div class="row shadow mb-4">
		<div class="card-body">
			<table border="1" cellspacing="0" cellpadding="10" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Codeno</th>
						<th>Name</th>
						<th>Photo</th>
						<th>Price</th>
						<th>Brand_id</th>
						<th>Subcategory_id</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1 @endphp
					@foreach($items as $item)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$item->codeno}}</td>
						<td>{{$item->name}}</td>
						<td><img src="{{asset($item->photo)}}" class="img-fluid" width="100" height="100"></td>
						<td>{{$item->price}}</td>
						<td>{{$item->brand->name}}</td>
						<td>{{$item->subcategory->name}}</td>
						<td>
							<div class="row">
								<a href="{{route('items.edit',$item->id)}} " style="display: inline-block;" class="btn btn-warning" >Edit</a>

								<form method="post" action="{{route('items.destroy',$item->id)}} " onsubmit="return confirm('Are you sure?')">
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
						<th>Codeno</th>
						<th>Name</th>
						<th>Photo</th>
						<th>Price</th>
						<th>Brand_id</th>
						<th>Subcategory_id</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

@endsection