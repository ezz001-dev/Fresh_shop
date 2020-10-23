  @extends('layout.master')
  @section('content')
<br><br>
  <div class="container">
  	@if($message = Session::get('order'))
  		 <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
          </div>
  	@endif
    <div class="row">
    		<!-- YOUR ORDER -->
	    	<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Invoice</th>
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
			    <tr class="tr">
			      <th scope="row">{{$no++}}</th>
			      <td class="invoice_num">{{$order->invoice_num}}</td>
			      <td>{{$order->username}}</td>
			      <td>{{$order->country}}</td>
			      <td class="total_ord">@currency($order->total)</td>
			      <td>{{$order->payment}}</td>
			      @if($order->status == 'WAITING')
			      	<td><a href="#" class="badge badge-warning">{{$order->status}}</a></td>
			      @endif
			      <td>Date</td>
			      <td>
			      	<a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#details{{$order->id}}">
			      		<span class="fas fa-info-circle"></span>
			      	</a>
			      	@csrf
			      	<a href="{{url('/order/delete/'.$order->id)}}" class="btn btn-outline-danger btn-sm url">
			      		<span class="fas fa-trash"></span>
			      	</a>
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
    </div> 
</div>	
			


<!-- MODAL DETAILS -->
@foreach($orders as $order)
<div class="modal fade" id="details{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    	<div class="modal-header">
    		<h5 class="modal-title">{{$order->username}} - {{$order->invoice_num}}</h5>
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
				        			<td class="total">@currency($order->total)</td>
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
        <!-- End card -->

        <div class="card">
			<div class="card-header">
				<span class="fa fa-shopping-cart"></span>
				<h2 class="card-title">Upload Your Payment Here</h2>
			</div>
			<div class="card-body">
				<form action="{{url('payment/confirm')}}" method="POST" enctype="multipart/form-data" id="formPayment">
					 <!-- IMAGE PREVIEW  -->
					<img id="image_preview_container" src="" alt="preview image" class="rounded-circle mt-10 image_preview" style="max-height: 70px;">
					<br>
					 
					@csrf
						<input type="hidden" name="order_id" value="{{$order->id}}">
					<div class="form-group">
						<input type="file" name="image" class="form-control image" id="image">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-outline-info form-control" id="payment">Pay Now</button>
					</div>
				</form>
			</div>
		</div>

      </div>
    </div>
  </div>
</div>

@endforeach

<script>
	// ======================================================
	// GAK PAKE AJAX DULU YANG PENTING SISTEMNYA JALAN DULU 
	// ======================================================
	$(document).ready(function(){
		// delete order
		$('.fa-trash').on('click',function(e){
			e.preventDefault();
			var _thiss = $(this).parents('.tr');
			var _csrf  = $("input[name='_token']").val();
			var url    = _thiss.find('.url').attr('href');

			_thiss.html(`<div class="spinner-border spinner-border-xl" role="status">
							  <span class="sr-only"></span>
							</div>`);
			$.ajax({
				  method: "POST",
				  url: url ,
				  data: { _token:_csrf },
				  success : function(data){
			  		alert(data.message);
			  		_thiss.remove();
			 	 } 
			});

			return false;
		});

		// Preview Image
		$('.image').change(function(){
			var _this = $(this).parent().parent();
	            let reader = new FileReader();
	            reader.onload = (e) => { 
	              _this.find('.image_preview').attr('src', e.target.result); 
	            }
	            reader.readAsDataURL(this.files[0]); 
        });
	});

	// $(document).ready(function(){
	// 	$('#formPayment').on("submit", function(event){
	// 		event.preventDefault();
	// 		var message = $("#message").html(`<center><div class="spinner-border spinner-border mr-20" role="status"><span class="sr-only">Loading...</span></div></center><br>`);
	// 		$.ajax({
	// 			method : "POST",
	// 			url    : '/payment/upload',
	// 			data   : new FormData(this),
	// 			dataType : 'JSON',
	// 			contentType : false,
	// 			cache : false,
	// 			processData : false,
	// 			success : function(response){
	// 				 console.log(response.response);	
	// 			},
	// 		});
	// 		return false;
	// 	});
				
	// }); 

</script>

  @endsection