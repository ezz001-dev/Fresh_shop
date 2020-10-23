@extends('layout.masterAdmin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-12">
			<div class="card">
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="card-body">
							<div class="card-img-top">
								<img src="{{url('freshshop/images/Users/'.$data->image)}}" class="rounded-circle" style="height: 120px;">
							</div>
							<br>
						    <h5 class="card-title li_username">{{$data->username}}</h5>
						    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#form_admin">Update Profile</button>
						 </div>	
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="card-body">
							<h3 class="card-title">Admin Info</h3>
		  						<ul class="list-group list-group-flush">
		  							<li class="list-group-item" id="li_username">{{$data->username}}</li>
		  							<li class="list-group-item" id="li_role">{{$data->role}}</li>
		    						<li class="list-group-item" id="li_phone">{{$data->phone}}</li>
		    						<li class="list-group-item" id="li_email">{{$data->email}}</li>
		    						<li class="list-group-item" id="li_gender">{{$data->gender}}</li>
		    						<li class="list-group-item" id="li_birth">{{$data->birth}}</li>
		    						<li class="list-group-item" id="li_city">{{$data->city}}</li>
		  						</ul>
						 </div>	
					</div>
				</div>
			</div>		
		</div>

		<div class="col-lg-6 col-md-12 col-sm-12">
			<div class="card">
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
						    <h2 class="card-title">Blog</h2>
						    <h6 class="card-subtitle mb-2 text-muted">Post Blog</h6>
						    <form>
						    	<div class="form-group">
						    		<input type="text" name="title" class="form-control" placeholder="title">
						    	</div>
						    	<div class="form-group">
						    		<textarea class="form-control" name="content" placeholder="Create Blog"></textarea>
						    	</div>
						    	<div class="form-group">
						    		<button type="submit" class="btn btn-outline-primary">Post</button>
						    	</div>
						    </form>
						 </div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="form_admin" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Update Profile</h3>
			</div>
			<div class="modal-body">
				
					@csrf
					<input type="hidden" name="id" id="id" value="{{$data->id}}">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" value="{{$data->username}}">
					</div>
					<div class="form-group">
						<label for="addres">Addres</label>
						<input type="text" name="addres" id="addres" class="form-control" value="{{$data->addres}}">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control" value="{{$data->phone}}">
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="custom-select" name="gender" id="gender">
						  <option disabled="" selected> Select Gender </option>
						  <option value="male">Male</option>
						  <option value="female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<input type="text" name="city" id="city" class="form-control" value="{{$data->city}}">
					</div>
					<div class="form-group">
       					<label for="birth"> Birth</label>
       					<input type="text" name="birth" id="birth" class="form-control" placeholder="Birth" value="{{$data->birth}}">
       				</div>
					<div class="form-group">
						<button class="btn btn-outline-primary" id="btnUpdate">Update</button>
					</div>
				
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function(){

		$('#birth').datepicker();
		$('#btnUpdate').on('click',function(event){
			event.preventDefault();
			var id       = $("#id").val(); 
			var username = $("#username").val();
			var addres   = $("#addres").val();
			var gender   = $("#gender").val();
			var phone    = $("#phone").val();
			var city     = $("#city").val();
			var birth    = $("#birth").val();
			var url      = '/admin/edit/';
			var _csrf    = $("input[name='_token']").val();

			// var spiner   = $(".modal").html(`<div class="spinner-border spinner-border-lg" role="status">
			// 				  <span class="sr-only">Loading...</span>
			// 				</div>`);

			$.ajax({
				  method: "POST",
				  url: url ,
				  data: { id:id, _token:_csrf , username:username , addres:addres , gender:gender , phone:phone , city:city , birth:birth },
				  success : function(data){
			  	  
					  $("#li_username").html(data.username);
					  $(".li_username").html(data.username);
					  $("#li_phone").html(data.phone);
					  $("#li_email").html(data.email);
					  $("#li_gender").html(data.gender);
					  $("#li_birth").html(data.birth);
					  $("#li_city").html(data.city);
					  // spiner.remove();

		 		 }

			});
				$(".modal").modal('hide');
		});
	});
		
	
</script>
@endsection
