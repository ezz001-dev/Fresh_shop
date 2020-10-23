@extends('layout.masterAdmin')
@section('content')

<div class="container">

	<div class="card">
	  <div class="card-body">
	  	<h2 class="card-title">Carts</h2>
	    <form>
	    	<div class="row">
	    		<div class="col-md-6">
			    	<div class="form-group">
			    		<input type="text" name="username" class="form-control username" placeholder="Username">
			    	</div>
			    </div>
			    <div class="col-md-6">
			    	<div class="form-group">
			    		<input type="text" name="product_name" class="form-control product_name" placeholder="Product Name">
			    	</div>
			    </div>
			    <div class="col-md-6">
			    	<div class="form-group">
				        <select class="custom-select type" name="type" id="Type">
				          <option disabled="" selected> Select Type </option>
				          <option value="fruits">Fruits</option>
				          <option value="vegetable">Vegetable</option>
				          <option value="animals">Animals</option>
				        </select>
				     </div>
				</div>
			    <div class="col-md-6">
			    	<div class="form-group">
			    		<button type="button" class="btn btn-outline-primary form-control" id="search">Search</button>
			    	</div>
		    	</div>
	    	</div>
	    </form>
	    	<a href="#" class="card-link">Back to Dashboard</a>
	    </div>
	</div>
	<br>

	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Usename</th>
	      <th scope="col">Product Name</th>
	      <th scope="col">Price</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Subtotal</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody class="result">
	  	<?php $no = 1;?>
	  	@foreach($carts as $cart)
	    <tr>
	      <th scope="row">{{$no++}}</th>
	      <td>{{$cart->username}}</td>
	      <td>{{$cart->product_name}}</td>
	      <td>{{$cart->price}}</td>
	      <td>{{$cart->quantity}}</td>
	      <td>{{$cart->subtotal}}</td>
	      <td>
	      	<a href="#" class="btn btn-outline-danger btn-sm">Remove</a>
	      	<a href="#" class="btn btn-outline-info btn-sm">Edit</a>
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
</div>


<script>
	

$(document).ready(function(){
	$('#search').on('click',function(){
		var username     = $('.username').val();
		var product_name = $('.product_name').val();
		var type 		 = $('.type').val();

		$('.result').html("<h1>Loading ...</h1>")
		$.ajax({
			  method: "GET",
			  url: "/admin/carts/search?username="+username+"&product_name="+product_name+"&type="+type,
			  success : function(data){

			  	if (data == null) {
			  		$('.result').html('<h1> Not Found Data </h1>');
			  	}else{
			  		$('.result').html(data);
			  	}

			  } 
		});
	});
});



</script>

@endsection