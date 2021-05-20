<!-- product left -->
<div class="side-bar col-lg-3">
    <div class="search-hotel">
        <h3 class="agileits-sear-head">Search Here..</h3>
        <form action="#" method="post">
            <input class="form-control" type="search" name="search" placeholder="Search here..." required="">
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
                <input title="price" type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
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
                <input title="brand" type="checkbox" class="checked">
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
                <input title="categories" type="checkbox" class="checked">
                <span class="span">{{$category->name}}</span>
            </li>
            @endforeach

        </ul>
    </div>
    <!-- //discounts -->
</div>
<!-- //product left -->