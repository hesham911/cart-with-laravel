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
            <div class="row" id="product-data">
                @include('frontend.partials.content-data')
            </div>


        </div>
    </div>
    <!--//product right-->
@endsection

@push('custom-js')
<script>
    googles.cart.on('add', function (idx, product, isExisting) {
        var urlAdd = '{{route('ajax.store.item.cart')}}';
        var urUpdate = '{{route('ajax.update.item.cart')}}';

        // url = url.replace(':id',product._data.id);
        $.ajax({
            type: "POST",
            url: urlAdd,
            data: product._data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                data =  googles.cart.items()

            }
        });
        product.on('change', function (key) {
            $.ajax({
                type: "POST",
                url: urUpdate,
                data: product._data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                   // console.log(data);
                }
            });
        })
    });
    googles.cart.on('remove', function (evt,product) {

        var urlRemove = '{{route('ajax.delete.item.cart')}}';
        $.ajax({
            type: "POST",
            url: urlRemove,
            data: product._data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                //console.log(data);
            }
        });
    });
</script>
<script>

    $(document).ready(function() {
                $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
                    filter(page);
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            filter(page);
        });

        $('#search').on('keyup', function() {
            $value = $(this).val();
            filter(1);
        });

        $('.categories').on('click', function(e) {
            filter();
        });

        $('.brands').on('click', function (e) {
            filter();
        });


        $("#slider-range").on('slidechange', function (event, ui) {
            filter();

        })

    });

    function filter(page) {


        var search = $('#search').val();

        var categories = [];
       //console.log($(".categories").filter(':checked'));
        $(".categories").each(function () {
            if ($(this).is(":checked")){
                categories.push($(this).val())
            }
        });

        // Search with brands
        var brands = [];
        $(".brands").each(function () {
            if ($(this).is(":checked")){
                brands.push($(this).val())
            }
        });
        // Search with price
        var price  = $("#slider-range").slider('values');

        //console.log(price);

        $.ajax({
            type: "GET",
            data: {
                'search_query':search,
                'categories': categories,
                'brands': brands,
                'price': price
            },
            url: "{{ route('product.filter') }}" + "?page=" + page,
            success:function(data) {
                $('#product-data').html(data);
            }
        });
    }
</script>
@endpush