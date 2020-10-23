@extends('layout.master')
@section('content')
<style type="text/css">
    
    .img-fluid{
        height: 180px;
    }

</style>
	<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



<!-- Start Shop Page -->

<div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                        <option data-display="Select">Nothing</option>
                                        <option value="1">Popularity</option>
                                        <option value="2">High Price → High Price</option>
                                        <option value="3">Low Price → High Price</option>
                                        <option value="4">Best Selling</option>
                                    </select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($data as $row)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="{{url('freshshop/images/products/'.$row->images)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{('/product/details/'.$row->id)}}" data-placement="right"><i class="fas fa-eye"></i></a></li>

                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Compare"><i class="fas fa-sync-alt"></i></a></li>

                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" data-toggle="modal" data-target="#modalCart{{$row->id}}">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{$row->name}}</h4>
                                                    <h5> @currency($row->price) </h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>

                            <!-- Tab list View -->
                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                 <!-- Looping data -->
                                    @foreach($data as $row)
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img src="{{url('freshshop/images/products/'.$row->images)}}" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>{{$row->name}}</h4>
                                                    <h5> <del>$ 60.00</del> Rp.{{$row->price}}</h5>
                                                    <!-- DETAILS -->
                                                    <p>{{$row->details}}</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



				<div class="col-xl-3 col-lg-3 sidebar-shop-right">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action category_list" href="{{url('categories/all')}}">All<small class="text-muted"> ({{$data->count()}})</small>
                                    </a>
                                </div>
                                @foreach($categories as $category)
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action category_list" href="{{url('categories/'.$category->id)}}">{{$category->categories}} <small class="text-muted">({{$category->product->count()}})</small>
								    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 25%; width: 50%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 25%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 75%;"></span></div>
                                <p>
                                    <input type="text" id="amount" readonly="" style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Shop Page -->
<!-- Cart Modal quantity -->
@foreach($data as $row)

<div class="modal fade" id="modalCart{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Cart - Form</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/cart/'.$row->id)}}" method="POST" id="form-cart" class="form-cart">
            @csrf
            <input type="hidden" name="id" class="form-control" value="{{$row->id}}">
            <div class="form-group">
                <img src="{{url('freshshop/images/products/'.$row->images)}}" class="rounded-circle" style="height: 50px;">
            </div>
            <div class="form-group">
                <h3 class="form-control" name="name">{{$row->name}}</h3>
            </div>
            <div class="form-group">
                <label for="Quantity">Select Quantity</label>
                <input type="number" name="quantity" class="form-control" id="Quantity" value="{{$row->quantity}}">
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary" id="cart">Add to Cart</button>
            </div>
            <button type="button" data-dismiss="modal" class="form-control btn btn-warning">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach


<script>
    
    $(document).ready(function(){

            $('.form-cart').on('submit',function(e){
                e.preventDefault();
                let url = $(this).attr('action');

                $.ajax({
                 method : "POST",
                 url    : url,
                 data   : new FormData(this),
                 dataType : 'JSON',
                 contentType : false,
                 cache : false,
                 processData : false,
                 success : function(response){
                     alert(response.message);  
                     },
                });
                $('.modal').modal('hide');

                return false;
            });

            $('.category_list').on('click',function(e){
                e.preventDefault();
                let url_list = $(this).attr('href');
                
                $.ajax({
                    method : "GET",
                    url    : url_list,
                    success: function(data){
                        $('.product-categorie-box').html(data);
                    }
                });
                return false;
            });



    })

</script>

@endsection