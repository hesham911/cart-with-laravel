@extends('layouts.frontend')

@section('content')
    <!--/product right-->
    <div class="left-ads-display col-lg-9">
        <div class="wrapper_top_shop">
            <div class="row">
                <div class="col-md-6 shop_left">
                    <img src="{{asset('assets/images/banner3.jpg')}}" alt="">
                    <h6>40% off</h6>
                </div>
                <div class="col-md-6 shop_right">
                    <img src="{{asset('assets/images/banner4.jpg')}}" alt="">
                    <h6>50% off</h6>
                </div>

            </div>
            <div class="row">
                <!-- /womens -->
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
            </div>

        </div>
    </div>
    <!--//product right-->
@endsection

@push('custom-js')
<script>

    googles.cart.on('add', function (idx, product, isExisting) {
        //console.log(product._data.id);
        var url = '{{route('ajax.store.item.cart',['productId'=> ":id"])}}';

        url = url.replace(':id',product._data.id);
        $.ajax({
            type: "POST",
            url: url,
            data: product._data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log(data);
            }
        });
        if (isExisting){
            console.log(10);
            product.on('change', function (key) {

            })
        }
    });
    googles.cart.on('remove', function (evt) {
        console.log(12);
    });
</script>
@endpush