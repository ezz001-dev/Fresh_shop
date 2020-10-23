@extends('layout.masterAdmin')
@section('content')


<div class="container">

	<div class="card">
	  <div class="card-body">
	  	<h2 class="card-title">Transaction</h2>
	    <form>
	    	<div class="row">
	    		<div class="col-md-6">
			    	<div class="form-group">
			    		<input type="text" name="date" class="form-control" id="date">
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
	      <th scope="col">Username</th>
	      <th scope="col">Country</th>
	      <th scope="col">Total</th>
	      <th scope="col">Payment</th>
	      <th scope="col">Status</th>
	      <th scope="col">Date</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody class="result">
	  	<?php $no = 1;?>
	  	@foreach($orders as $order)
	    <tr>
	      <th scope="row">{{$no++}}</th>
	      <td>{{$order->username}}</td>
	      <td>{{$order->country}}</td>
	      <td>@currency($order->total)</td>
	      <td>{{$order->payment}}</td>
	      @if($order->status == 'WAITING')
	      <td><a href="#" class="badge badge-warning">{{$order->status}}</a></td>
	      @elseif($order->status == 'PROCESS')
	      <td><a href="#" class="badge badge-info">{{$order->status}}</a></td>
	      @elseif($order->status == 'SHIPPED')
	      <td><a href="#" class="badge badge-primary">{{$order->status}}</a></td>
	      @elseif($order->status == 'FINISH')
	      <td><a href="#" class="badge badge-success">{{$order->status}}</a></td>
	      @endif
	      <td>Date</td>
	      <td>
	      	<a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#details{{$order->id}}">
	      		<span class="fas fa-info-circle"></span>
	      	</a>
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
</div>


<!-- MODAL DETAILS -->
@foreach($orders as $order)
<div class="modal fade" id="details{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    	<div class="modal-header">
    		<h5>{{$order->username}} - Details</h5>
    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
    	</div>
      <div class="modal-body">
        <div class="card">
        	<div class="card-body">
        		<div class="row">
        			<div class="col-md-12">
        				<h5 class="card-subtitle"> Personal Info </h5>
        				<table class="table table-hover">
        					<thead>
							    <tr>
							      <th scope="col">Country</th>
							      <th scope="col">Addres</th>
							      <th scope="col">Provinci</th>
							      <th scope="col">City</th>
							      <th scope="col">Sub Districts</th>
							      <th scope="col">Pos Code</th>
							      <th scope="col">Total</th>
							      <th scope="col">Payment</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<tr>
						    		<td>{{$order->country}}</td>
				        			<td>{{$order->addres}}</td>
				        			<td>{{$order->provinci}}</td>
				        			<td>{{$order->city}}</td>
				        			<td>{{$order->sub_districts}}</td>
				        			<td>{{$order->pos_Code}}</td>
				        			<td>@currency($order->total)</td>
				        			<td>{{$order->payment}}</td>	
						    	</tr>
						    </tbody>
        				</table>
        			</div>

        			<div class="col-md-12">
        				<br><br>
        				<h5 class="card-subtitle"> Products </h5>
        					<table class="table table-hover">
        						<thead>
        							<tr>
        								<th>Name</th>
        								<th>Quantity</th>
        								<th>Price</th>
        								<th>Subtotal</th>
        							</tr>
        						</thead>
        						<tbody>
        							@foreach($order->orderDetail as $orderDetail)
	        						<tr>
		        					  <td>{{$orderDetail->product->name}}</td>
				        			  <td>{{$orderDetail->quantity}}</td>
				        			  <td>{{$orderDetail->product->price}}</td>
				        			  <td>@currency($orderDetail->subtotal)</td>
	        						</tr>
		        					@endforeach
        						</tbody>
        					</table>
        			</div>	
        		</div>
        		
        		
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach



<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
	
	$(document).ready(function(){

			let start = moment().startOf('month');
            let end = moment().endOf('month');

            //alert(start);

		    $('#date').daterangepicker({
                startDate: start,
                endDate: end
            });

	});

</script>
@endsection