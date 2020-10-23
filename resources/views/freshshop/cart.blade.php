    @extends('layout.master')
    @section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    @if(Auth::user()->role == 'admin')
    <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <h1> Admin Does'nt Have Acces </h1>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    @else
    <!-- Start Cart -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $data)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                    <img class="img-fluid" src="{{url('freshshop/images/products/'.$data->product->images)}}" alt="">
                                </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                    {{$data->product_name}}
                                </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{$data->price}}</p>
                                    </td>
                                    <td class="quantity-box">
                                        <p>{{$data->quantity}}</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>{{$data->subtotal}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#" data-toggle="modal" data-target="#modalRemove{{$data->id}}">
                                    <i class="fas fa-times"></i>
                                </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    @endif

    <!-- End Cart -->

    <!-- Modal Remove -->
    @foreach($carts as $data)
    <div class="modal" id="modalRemove{{$data->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Remove</h2>
                </div>
                <div class="modal-body">
                    <h1>Yakin ?? </h1>

                    <form action="{{url('/cart/delete/'.$data->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger form-control">Delete</button>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info form-control">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach

    @endsection