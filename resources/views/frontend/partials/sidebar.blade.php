<!-- product left -->
<div class="side-bar col-lg-3">
    <div class="search-hotel">
        <h3 class="agileits-sear-head">Search Here..</h3>
        <form action="#" method="post">
            <input class="form-control" id="search" type="search" name="search" placeholder="Search here..." required="">
            <button class="btn1">
                <i class="fas fa-search"></i>
            </button>
            <div class="clearfix"> </div>
        </form>
    </div>
    <!-- price range -->
    <div class="range">
        <h3 class="agileits-sear-head">Price range</h3>
        <ul class="dropdown-menu6">
            <li>

                <div id="slider-range"></div>
                <div class="m-3 text-center">
                    <input title="price" class="col-md-4" type="text" name="start_price" id="amount_start" disabled />
                    <input title="price" class="col-md-4" type="text" name="end_price" id="amount_end" disabled/>
                </div>

            </li>
        </ul>
    </div>
    <!-- //price range -->
    <!--preference -->
    <div class="left-side">
        <h3 class="agileits-sear-head">Brand</h3>
        <ul>
            @foreach($brands as $brand)
            <li>
                <input title="brand" name="brands" id="brands" value="{{$brand->id}}" type="checkbox" class="checked brands">
                <span class="span" data-brand-id="{{$brand->id}}">{{$brand->name}}</span>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- // preference -->
    <!-- discounts -->
    <div class="left-side">
        <h3 class="agileits-sear-head">Categories</h3>
        <ul>
            @foreach($categories as $category)
            <li>
                <input title="categories" name="categories"  id="categories" value="{{$category->id}}" type="checkbox" class="checked categories">
                <span class="span">{{$category->name}}</span>
            </li>
            @endforeach

        </ul>
    </div>
    <!-- //discounts -->
</div>
<!-- //product left -->