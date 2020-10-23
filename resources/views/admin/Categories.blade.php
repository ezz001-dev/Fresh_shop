@extends('layout.masterAdmin')
@section('content')

<div class="container-fluid">

	
      @if ($message = Session::get('update'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
      @endif

	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalCategory">
        <span class="fa fa-edit"></span> Add New Category   
      </a>
		</div>
		<div class="col-md-6">
			<input type="text" class="form-control" name="Search" placeholder="Search">
		</div>
	</div>
	<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th> 
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;?>
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{$category->categories}}</td>
      <td>
      	<a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-outline-danger"><span class="fa fa-trash"></span></a> 
      	<a href="#" class="btn btn-outline-info small" data-toggle="modal" data-target="#ModalEdit{{$category->id}}"><span class="fa fa-edit"></span></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<!-- Modal Add Product-->
<div class="modal fade" id="ModalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form method="post" action="{{url('/category/add/')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
	      <div class="form-group">
		        <label for="formGroupExampleInput">Name</label>
		        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Name">
	      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
   </form>
    </div>
  </div>
</div>

@endsection