
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
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="View"><i class="fas fa-eye"></i></a></li>
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



