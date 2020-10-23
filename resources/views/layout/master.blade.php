<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{url('freshsop/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{url('freshshop/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('freshshop/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{url('freshshop/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{url('freshshop/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('freshshop/css/custom.css')}}">

     <!-- ALL JS FILES -->
    <script src="{{url('freshshop/js/jquery-3.2.1.min.js')}}"></script>
   

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{url('bootstrapDatepicker/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrapDatepicker/css/bootstrap-datepicker3.min.css')}}">
    <script src="{{url('bootstrapDatepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{url('select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{url('select2/dist/js/select2.js')}}"></script>
    <script src="{{url('select2/dist/js/select2.min.js')}}"></script>

</head>

<body>

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="freshshop/images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/home')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/about')}}">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="{{url('/shop')}}">Shop</a></li>
                                <li><a href="{{url('cart')}}">Cart</a></li>
                                <li><a href="{{url('wishlist')}}">Wishlist</a></li>
                                @auth
                                    @if(Auth::user()->role == 'admin')
                                    <li><a href="{{url('/admin/')}}">Admin</a></li>
                                    @else
                                    <li><a href="{{url('/profile/'.Auth::user()->id)}}">Profile</a></li>
                                    @endif
                                @endauth
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact Us</a></li>
                    </ul>
                    @guest
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Login">Login</button>
                    @endguest
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                @auth
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-user"></i>
								<p>Profile</p>
							</a>
						</li>
                    </ul>
                </div>
                @endauth
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            @auth
            <div class="side">
                <a href="#" class="close-side ml-2"><i class="fa fa-times"></i></a>
                <ul>
                    <li>
                         <div class="card mt-4">
                            <div class="card-body">
                                @if(Auth::user()->role == 'admin')
                                    <a href="{{url('/admin')}}">
                                        <img src="{{url('/freshshop/images/Users/'.Auth::user()->image)}}" style="height: 70px;" class="rounded-circle">
                                    </a>
                                @else
                                    <a href="{{url('/profile/'.Auth::user()->id)}}">
                                        <img src="{{url('/freshshop/images/Users/'.Auth::user()->image)}}" style="height: 70px;" class="rounded-circle">
                                    </a>
                                @endif
                                <hr>
                                <h2>{{Auth::user()->username}}</h2>
                                <hr>
                                <form id="logout-form" action="{{url('/logoutnew')}}" method="POST" >
                                 @csrf
                                <button type="submit" class="btn btn-outline-primary">Logout</button>
                             </form>
                            </div>
                         </div>   
                    </li>
                </ul>
            </div>
            @endauth
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
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

    @yield('content')






    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Business Time</h3>
							<ul class="list-time">
								<li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Newsletter</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Email Address*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Submit</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Social Media</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>


        <!-- Modal -->
    <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Login</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="/login">
            <div class="modal-body">
            
                @csrf
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" name="email" id="username" class="form-control" placeholder="Masukan Username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                </div>
            

            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col">
                        Didn't have account ? <a href="#" class="badge-light register" data-toggle="modal" data-target="#Register">Register Here</a>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>






    <!-- Modal Register-->
    <div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Register</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
            
               <form method="POST" action="{{ route('register') }}" id="form-register">
                @csrf            
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                </div>

                <div class="form-group">
                    <label for="confirmPass">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="confirmPass" class="form-control" placeholder="Konfirmasi Password">
                </div>           
                </form>
            </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="document.getElementById('form-register').submit();">Register</button>
              </div>
        </div>
      </div>
    </div>




    <script src="{{url('freshshop/js/popper.min.js')}}"></script>
    <script src="{{url('freshshop/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{url('freshshop/js/jquery.superslides.min.js')}}"></script>
    <script src="{{url('freshshop/js/bootstrap-select.js')}}"></script>
    <script src="{{url('freshshop/js/inewsticker.js')}}"></script>
    <script src="{{url('freshshop/js/bootsnav.js')}}"></script>
    <script src="{{url('freshshop/js/images-loded.min.js')}}"></script>
    <script src="{{url('freshshop/js/isotope.min.js')}}"></script>
    <script src="{{url('freshshop/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('freshshop/js/baguetteBox.min.js')}}"></script>
    <script src="{{url('freshshop/js/form-validator.min.js')}}"></script>
    <script src="{{url('freshshop/js/contact-form-script.js')}}"></script>
    <script src="{{url('freshshop/js/custom.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.register').on('click',function(){
                $('#Login').modal('hide');
            });
        });
    </script>

</body>

</html>