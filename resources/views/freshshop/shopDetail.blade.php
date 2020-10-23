

@extends('layout.master')

@section('content')


	<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



     <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('freshshop/images/big-img-01.jpg')}}" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('freshshop/images/big-img-02.jpg')}}" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('freshshop/images/big-img-03.jpg')}}" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset('freshshop/images/smp-img-01.jpg')}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="{{asset('freshshop/images/smp-img-02.jpg')}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="{{asset('freshshop/images/smp-img-03.jpg')}}" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->name}}</h2>
                        <h5>{{$product->price}} </h5>
                        <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span><p>
						<h4>Short Description:</h4>
						<p>{{$product->details}}</p>
						<ul>
							<li>
								<div class="form-group quantity-box">
									<label class="control-label">Quantity</label>
									<input class="form-control" value="{{$product->quantity}}" min="0" max="20" type="number">
								</div>
							</li>
						</ul>

						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
								<a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a>
								<a class="btn hvr-hover" data-fancybox-close="" href="#">Add to cart</a>
							</div>
						</div>

						<div class="add-to-btn">
							<div class="add-comp">
								<a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
							</div>
							<div class="share-bar">
								<a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
							</div>
						</div>
                    </div>
                </div>
            </div>
			<br>
            <!-- Diskusi Product -->
				<div class="card card-outline-secondary">
					<div class="card-header">
						<h2>Diskusi Product</h2>
					</div>
					<div class="card-body">
						<br>
                        <!-- Images profile -->
						<form class="form" method="POST" action="{{url('discus/post/'.$product->id)}}">
							<div class="row">
								<div class="col-md-1">
									<span class="ml-1">
								    	<img class="rounded-circle border p-1" src="{{url('freshshop/images/Users/'.Auth::user()->image)}}" alt="Generic placeholder image" height="55px" width="55px">
								    </span>
								</div>
								<div class="col-md-9 mr-4">
									<div class="input-group input-group-lg mt-1">
										@csrf
									  <input type="text" class="form-control" name="content" aria-label="Sizing example input" aria-describedby="button-addon1">
									   <div class="input-group-prepend">
									    <button class="btn btn-outline-primary " type="submit" id="button-addon1"><span class="fas fa-paper-plane"></span></button>
									  </div>
									</div>
								</div>
							</div>
						</form>
						<br>
						<br>
						@foreach($discuses as $row)
						<div class="media">
						  <img src="{{url('freshshop/images/Users/'.$row->user->image)}}" class="mr-3 rounded-circle" alt="{{$row->user->username}}" height="50" width="50">
						  <div class="media-body">
						    <h5 class="mt-0"> {{$row->user->username}} <small>({{$row->user->role}})</small></h5>
						    <p class="content-comment">{{$row->discus}}</p>
						   	<br>

						   <span class="fas fa-heart btn btn-outline-primary btn-sm"></span> 
						   @if(Auth::user()->id == $row->user->id)
						   @else
						   <span class="fas fa-reply btn btn-outline-primary btn-sm ml-1"></span>
						   @endif
						   <!-- =============== Reply ============== -->
						   <div class="reply">
						   		<form action="{{url('/reply/comment/')}}" class="reply-form">
								   	<div class="input-group mt-3 reply-input-wrapper col-md-10" style="display: none;">
								   	  <input type="hidden" name="id" value="{{$row->id}}">
									  <input type="text" name="reply-content" class="form-control reply-input-content" placeholder="Reply comment" aria-label="Recipient's username" aria-describedby="button-addon2">
									  <div class="input-group-append">
									    <button class="btn btn-outline-secondary reply-btn" type="button" id="button-addon2">
									    	<span class="fas fa-paper-plane"></span>
									    </button>
									  </div>
									</div>
								</form>
								<div class="reply-result">
									@foreach($row->reply as $reply)
									<hr>
									<div class="media mt-3">
								      <a class="mr-1" href="#">
								        <img src="{{url('freshshop/images/Users/'.$reply->user->image)}}" class="mr-1 rounded-circle" alt="..." height="55px" width="55px">
								      </a>
								      <div class="media-body">
								        <h5 class="mt-0"> {{$reply->user->username}} </h5>
								       	  {{$reply->content_reply}}

								       	  @if(Auth::user()->id === $reply->user->id)
								       	  	<span class="fas fa-trash btn btn-outline-danger"></span>
								       	  @endif
						   			  </div>	
							   	    </div>
							   	    @endforeach
								</div>
						   </div>
						</div>
					</div>
					<hr>
						@endforeach
				</div>
			 </div>
        </div>
    </div>
    <!-- End Cart -->

    <script>
    	$(document).ready(function(){
    		// Reply btn
    		$('.fa-reply').on('click',function(){
    			let _parent = $(this).parents('.media');
    			_parent.find('.reply-input-wrapper').toggle("slow");
    		})
    		// Reply btn admin
    		$('.reply-btn').on('click',function(){
    			let _parent    = $(this).parents('.media');
    			let _discus_id = _parent.find('input[name="id"]').val();
    			let _content   = _parent.find('.reply-input-content').val();
    			let _url	   = _parent.find('.reply-form').attr('action');
    			$.ajax({
    				method:"GET",
    				url:_url,
    				data:{content:_content,discus_id:_discus_id},
    				success:function(data){
    					 let result = _parent.find('.reply-result').append(`<hr>
							   		<div class="media mt-3">
								      <a class="mr-3" href="#">
								        <img src="{{url('freshshop/images/Users/`+ data.image +`')}}" class="mr-3 rounded-circle" alt="..." height="55px" width="55px">
								      </a>
								      <div class="media-body">
								        <h5 class="mt-0">`+ data.name +`</h5>
								       	`+ data.content +`
						   			  </div>	
							   	    </div>`);	
    				}
    			});
    			return false;
    		})
    	})
    </script>

 	@endsection