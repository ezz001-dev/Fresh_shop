@extends('layout.master')
@section('content')

<br>
<div class="container">

	 	<div class="col-md-12">
              @if ($message = Session::get('update'))
                <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
                </div>
              @endif
           </div>


           <div class="col-md-12">
              @if ($message = Session::get('order_count'))
                <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }} 
                  	<form action="{{url('/payment')}}" method="POST">
                  		@csrf
                  		<button type="submit" class="btn btn-outline-info">Lihat</button>
                  	</form>
                  </strong>
                </div>
              @endif
           </div>



	<div class="card">
		
		<div class="row">
			<div class="col-md-4">
				<div class="mr-4 ml-4 mt-4">
					<div class="card">
						<br>
					@foreach($data as $row)
					
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<img src="{{url('freshshop/images/Users/'.$row->image)}}" style="height: 200px; width: 200px;" class="rounded-circle" >
						</li>
					    <li class="list-group-item"><h3><strong>{{$row->username}}</strong></h3></li>
					    <li class="list-group-item">{{$row->gender}}</li>
					    <li class="list-group-item">{{$row->email}}</li>
					    <li class="list-group-item">{{$row->phone}}</li>
					    <li class="list-group-item">{{$row->addres}}</li>
					    <li class="list-group-item">{{$row->city}}</li>
					    <li class="list-group-item">{{$row->provinci}}</li>
					    @if(Auth::user()->id == $row->id)
					    <li class="list-group-item"><button class="btn btn-primary" data-toggle="modal" data-target="#EditProfile{{$row->id}}">Edit</button></li>
					    @else

					    @endif
					    
					</ul>
					@endforeach
					</div>
					<br>
				</div>
			</div>

			<div class="col-md-8">
				<div class="card-body">
							<h3>Your Cart</h3>
							<table class="table table-hover">
							  <thead>
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Name</th>
							      <th scope="col">Quantity</th>
							      <th scope="col">Subtotal</th>
							      <th scope="col">Remove</th>
							    </tr>
							  </thead>
							  <tbody>
							  @if($count == 0)
							  		<div class="alert alert-warning">
							  			<h3> You Didn't Have Cart </h3>
							  		</div>
							  		<a href="{{url('/shop')}}" class="btn btn-outline-info">Shop Now</a>
							  @else						  	
							  	<?php $no = 1;?>
							  	@foreach($carts as $cart)
							    <tr class="result">
							      <th scope="row">{{$no++}}</th>
							      <td class="name">{{$cart->product->name}}</td>
							      <td>
							      	<!-- Form Edit -->
							    		<input type="hidden" name="id" value="{{$cart->id}}">  	
							      		@csrf
							      		<div class="row">
							      			<div class="form-group col-md-8">
								      			<input type="number" name="quantity" value="{{$cart->quantity}}" class="form-control">
								      		</div>
								      		<div class="form-group col-md-4">
								      			<button class="btn btn-outline-info cart-update"><span class="fa fa-edit"></span></button>
								      		</div>
							      		</div>
							    
							      </td>
							      <td class="subtotal">@currency($cart->subtotal)</td>
							      <td>
							      	@csrf
							      	<input type="hidden" name="delete" value="{{$cart->id}}">
							      	<button class="btn btn-outline-danger  delete"><span class="fa fa-trash"></span></button>
							      </td>
							    </tr>
							    @endforeach
							  </tbody>
							  @endif
						</table>
				</div>
				<div class="card-footer">
					<div class="row">
							<div class="col-md-8">
								<h3> Total </h3>
							</div>
							<div class="col-md-3 ml-3">
								<h3 class="total">@currency($total)</h3>
							</div>	
					</div>
					@if($count == 0)
					@else
					<form action="{{url('/order/'.Auth::user()->id)}}" method="POST">
						@csrf
						<button type="submit" class="btn btn-outline-primary">Proses to Checkout</button>
					</form>
					@endif			
				</div>
			</div>
		</div>

	</div>

</div>
<br>
<br>



<!-- Modal Edit Profile -->
@foreach($data as $row)
<div class="modal fade" id="EditProfile{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Edit Profile</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<form id="form-profile" action="{{url('/profile/edit')}}" method="POST" enctype="multipart/form-data">
       		@csrf
       		<input type="hidden" name="id" value="{{$row->id}}">
       		<div class="form-group">
       			<label for="images">
       				<img src="{{url('freshshop/images/Users/'.$row->image)}}" style="height: 50px; width: 50px;" class="rounded-circle" id="images_preview"> 
       			</label>
       			<input type="file" name="images" id="images" class="file form-control">
       		</div>
       		<div class="form-group">
       			<label for="name">Full Name</label>
       			<input type="text" name="username" id="name" class="form-control" value="{{$row->username}}">
       		</div>
       		<div class="form-group">
       			<label for="phone"> Phone</label>
       			<input type="text" name="phone" id="phone" class="form-control" value="{{$row->phone}}">
       		</div>

       		<div class="form-group">
       			<label for="gender"> Gender </label>
       			<select class="custom-select" name="gender" id="city">
				  <option disabled=""> Select Gender </option>
				  <option value="{{$row->gender}}" selected="">{{$row->gender}}</option>
				  <option value="male">Male</option>
				  <option value="female">Female</option>
				</select>
       		</div>

       		<div class="form-group">
       			<label for="profesi"> Profesi </label>
       			<select class="custom-select" name="profesi" id="profesi">
				  <option disabled="" selected> Select Profesi </option>
				  <option value="{{$row->profesi}}" selected="">{{$row->profesi}}</option>
				  <option value="petani">Petani</option>
				  <option value="pedagang">Pedagang</option>
				</select>
       		</div>
       		<div class="form-group">
       			<label for="addres">Addres</label>
       			<input type="text" name="addres" id="addres" class="form-control" value="{{$row->addres}}">
       		</div>
       		<div class="form-group">
       			<label for="city"> City </label>
       			<select class="custom-select" name="city" id="city">
				  <option disabled=""> Choose Your City </option>
				  <option value="{{$row->city}}" selected="">{{$row->city}}</option>
				  <option value="garut">Garut</option>
				  <option value="jakarta">Jakarta</option>
				  <option value="bandung">Bandung</option>
				</select>
       		</div>
       		<div class="form-group">
       			<label for="city"> Provinci </label>
       			<select class="custom-select" name="provinci" id="city">
				  <option disabled="">Choose Your Provinci</option>
				  <option value="{{$row->provinci}}" selected="">{{$row->provinci}}</option>
				  <option value="jawa barat">Jawa Barat</option>
				  <option value="jawa timur">Jawa Timur</option>
				  <option value="jawa tengah">Jawa Tengah</option>
				</select>
       		</div>
       		<div class="form-group">
       			<label for="birth"> Birth</label>
       			<input type="text" name="birth" id="birth" class="form-control" placeholder="Birth" value="{{$row->birth}}">
       		</div>
       	</form>
      </div>
      <div class="modal-footer">
      	<button onclick="document.getElementById('form-profile').submit();" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
	$(document).ready(function(){

		// Preview Image
		$('#images').change(function(){
	         
	            let reader = new FileReader();
	            reader.onload = (e) => { 
	              $('#images_preview').attr('src', e.target.result); 
	            }
	            reader.readAsDataURL(this.files[0]); 

	        });

		$('#birth').datepicker();
		$('.cart-update').on('click',function(event){
			event.preventDefault();
			var _this    = $(this).parents('.result');
			var quantity = _this.find('.form-control').val();
			var id 		 = _this.find("input[name='id']").val();
			var txt_btn  = $(this).html(`<div class="spinner-border spinner-border-sm" role="status">
							  <span class="sr-only">Loading...</span>
							</div>`);
			var url 	 = "/cart/update/"+id;
			var _csrf    = $("input[name='_token']").val();

			// alert(id);
			// return false;

			$.ajax({
				  method: "POST",
				  url: url ,
				  data: { quantity:quantity, _token:_csrf },
				  success : function(data){
				  	var subtotal = _this.find('.subtotal').html('Rp. '+data.subtotal);
				  	var total    = $('.total').html('Rp. '+data.total);
			  		txt_btn.html(`<span class="fa fa-edit"></span>`);
			 	 } 
			});


		});


		$('.delete').on('click',function(event){

			
			var id    = $(this).parents('.result').find("input[name='delete']").val();
			var _csrf = $("input[name='_token']").val();

			var row   =	$(this).parents('.result').html(`<div class="spinner-border spinner-border-sm" role="status">
							  <span class="sr-only"></span>
							</div>`);


			$.ajax({
				method : "POST",
				url    : "/cart/delete/"+id,
				data   : { id:id , _token:_csrf} ,
				success : function(data){
					var total = $('.total').html(data['total']);
					row.remove();
				} 

			});
		});


	});
</script>

@endsection