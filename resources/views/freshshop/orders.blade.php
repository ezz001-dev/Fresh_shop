@extends('layout.master')
@section('content')

<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    @if($errors->any())
        @foreach($errors->all() as $message)
            <br>
            <div class="container alert alert-danger alert-dismissible" role="alert">
                <strong> {{$message}} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-lable="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif


    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" novalidate="" action="{{url('/payment')}}" method="POST" id="form-checkout">
                            @csrf
                            <div class="mb-3">
                                <label for="username">Username *</label>
                                <div class="input-group">
                                    <input type="text" name="username" class="form-control" id="username" value="{{$data['username']}}" required="">
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{$data['email']}}">
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" name="addres" class="form-control" id="address" value="{{$data['addres']}}" required="">
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="country">Country *</label>
                                    <select name="country" class="wide w-100" id="country">
    									<option value="Choose..." selected disabled >Choose...</option>
    									<option value="united states">United States</option>
                                        <option value="indonesia">Indonesia</option>
								    </select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">Province *</label>
                                    <select name="provinci" class="wide w-100" id="state">
									<option selected="" disabled>Choose...</option>
									<option value="jawa barat">Jawa Barat</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="jawa timur">Jawa Timur</option>
								</select>
                                    <div class="invalid-feedback"> Please provide a valid state. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="kabupaten">Districts</label>
                                    <select name="districts" class="wide w-100" id="kabupaten">
                                        <option selected="" disabled>Choose...</option>
                                        <option>Garut</option>
                                        <option>Bandung</option>
                                        <option>jakarta</option>
                                    </select>
                                    <div class="invalid-feedback"> Select Valid Kabupaten. </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="country">City</label>
                                    <select name="city" class="wide w-100" id="country">
                                        <option selected disabled >Choose...</option>
                                        <option value="garut">Garut</option>
                                        <option value="bandung">Bandung</option>
                                    </select>
                                    <div class="invalid-feedback"> Please select a valid kota. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">Kecamatan *</label>
                                    <select name="sub_districts" class="wide w-100" id="state">
                                        <option selected="" disabled>Choose...</option>
                                        <option>Cisurupan</option>
                                        <option>Bandung Barat</option>
                                        <option>Kebayoran</option>
                                    </select>
                                    <div class="invalid-feedback"> Please Select a valid Kecamatan. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="zip">Code Pos *</label>
                                    <input type="text" name="pos_code" class="form-control" id="zip" placeholder="" er="" required="">
                                    <div class="invalid-feedback"> Code Pos required. </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <div class="title"> <span>Payment</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" value="credit">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" value="debit">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" value="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" name="card_name" class="form-control" id="cc-name" placeholder="" required=""> <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback"> Name on card is required </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" name="card_number" class="form-control" id="cc-number" placeholder="" required="">
                                    <div class="invalid-feedback"> Credit card number is required </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" name="card_expired" class="form-control" id="cc-expiration" placeholder="" required="">
                                    <div class="invalid-feedback"> Expiration date required </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" name="code_security" class="form-control" id="cc-cvv" placeholder="" required="">
                                    <div class="invalid-feedback"> Security code required </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="{{asset('freshshop/images/payment-icon/1.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('freshshop/images/payment-icon/2.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('freshshop/images/payment-icon/3.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('freshshop/images/payment-icon/5.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('freshshop/images/payment-icon/7.png')}}" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1"> 
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Shipping Method</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                        <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                    <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">$10.00</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">$20.00</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @foreach($carts as $cart)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="{{('/product/detail/'.$cart->product->id)}}"> {{$cart->product_name}}</a>
                                            <div class="small text-muted">Price : @currency($cart->price) <span class="mx-2">|</span> Quantity : {{$cart->quantity}} <span class="mx-2">|</span>Subtotal :  @currency($cart->subtotal)</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> @currency($data['total']) </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Discount</h4>
                                    <div class="ml-auto font-weight-bold"> (Belum Aktif) </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Coupon Discount</h4>
                                    <div class="ml-auto font-weight-bold"> (Belum Aktif) </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> (Belum Aktif) </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> @currency($data['total']) </div>
                                </div>
                                <hr> 
                        </div>
                        <div class="col-12 d-flex shopping-box">
                            <button type="submit" class="btn btn-outline-primary" onclick="document.getElementById('form-checkout').submit();">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    @endsection