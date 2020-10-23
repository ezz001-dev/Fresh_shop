
@extends('layout.masterAdmin')
@section('content')

<style type="text/css">
  
  .fruits{
    height: 50px;
    width: 50px;
  }

</style>

<div class="container-fluid">

  @if ($message = Session::get('add'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
      @endif

	<div class="row">
		<div class="col-md-6">
			<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#Modal">
        <span class="fa fa-edit"></span> Add New Product   
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
      <th scope="col">Images</th>
      <th scope="col">Name</th>
	    <th scope="col">Type</th>      
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;?>
    @foreach($data as $row)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td><img src="{{url('freshshop/images/products/'.$row->images)}}" class="rounded fruits" alt="freshshop"></td>
      <td class="name">{{$row->name}}</td>
      <td>{{$row->type}}</td>
      <td>{{$row->quantity}}</td>
      <td>{{$row->price}}</td>
      <td>
      	<a href="{{url('/product/delete/'.$row->id)}}" class="btn btn-outline-danger"><span class="fa fa-trash"></span></a> 
      	<a href="#" class="btn btn-outline-info small" data-toggle="modal" data-target="#ModalEdit{{$row->id}}"><span class="fa fa-edit"></span></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


<!-- Modal Add Product-->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form method="post" action="{{url('/product/add/')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="Type"> Category </label>
        <select class="custom-select" name="category_id" id="Type">
          <option disabled="" selected="">Select Category</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->categories}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="Type"> Type </label>
        <select class="custom-select" name="type" id="Type">
          <option disabled="" selected="">Select Type</option>
          @foreach($categories as $category)
          <option value="{{$category->categories}}">{{$category->categories}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Quantity</label>
        <input type="number" name="quantity" class="form-control" id="formGroupExampleInput" placeholder="Quantity">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Price</label>
        <input type="number" name="price" class="form-control" id="formGroupExampleInput" placeholder="Price">
      </div>
      <div class="form-group">
          <label for="exampleFormControlFile1">
           Image
          </label>
          <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="details" placeholder="Details Product"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
   </form>
    </div>
  </div>
</div>
<!-- Modal Edit Product -->
@foreach($data as $row)
<div class="modal fade" id="ModalEdit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form method="post" action="{{url('/product/edit/')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$row->id}}">
      <div class="modal-body">
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="Product_Name" class="form-control" id="formGroupExampleInput" value="{{$row->name}}">
      </div>
      <div class="form-group">
        <label for="Type"> Type </label>
        <select class="custom-select" name="type" id="Type">
          <option disabled="" selected> {{$row->type}} </option>
          <option value="fruits">Fruits</option>
          <option value="vegetable">Vegetable</option>
          <option value="animals">Animals</option>
        </select>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Quantity</label>
        <input type="text" name="Quantity" class="form-control" id="formGroupExampleInput" value="{{$row->quantity}}">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Price</label>
        <input type="text" name="Price" class="form-control" id="formGroupExampleInput" value="{{$row->price}}">
      </div>
      <div class="form-group">
         <label for="exampleFormControlFile1">
           <img src="{{url('freshshop/images/products/'.$row->images)}}" height="100" width="100">
         </label>
        <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
   </form>
    </div>
  </div>
</div>
@endforeach

<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>
@endsection