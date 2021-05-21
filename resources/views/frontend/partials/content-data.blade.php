<!-- /products -->
@if($products->count() > 0)
    @foreach($products as $k => $product)
        <div class="col-md-3 product-men women_two shop-gd">
            <div class="product-googles-info googles">
                <div class="men-pro-item">
                    <div class="men-thumb-item">
                        <img src="{{asset('assets/images/s1.jpg')}}" class="img-fluid" alt="">
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="single.html" class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>

                    </div>
                    <div class="item-info-product">
                        <div class="info-product-price">
                            <div class="grid_meta">
                                <div class="product_price">
                                    <h4>
                                        <a href="single.html">{{$product->name}}</a>
                                    </h4>
                                    <div class="grid-price mt-2">
                                        <span class="money ">{{$product->price}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="googles single-item hvr-outline-out">
                                {{--<a href="{{route('carts.storecart',['productId'=>$product->id])}}"--}}
                                {{--data-cart="{{$product->id}}" class="product-add-to-compare"--}}
                                {{--data-toggle="tooltip" data-placement="top" title="اضف للمشتريات">--}}
                                {{--<i class="fa fa-shopping-cart"></i>--}}
                                {{--</a>--}}

                                <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="googles_item" value="{{$product->name}}">
                                    <input type="hidden" name="amount" value="{{$product->price}}">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="cart-id" value="{{auth()->id()}}">
                                    <button type="submit" class="googles-cart pgoogles-cart">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div>
        {{$products->links()}}
    </div>
@else
    <div class="alert alert-info mr-auto ml-auto">
        <p class="font-weight-bolder">No Products Matching</p>
    </div>
@endif

