@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Product</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('index')}}">Home</a> / <span>Product</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="source/image/product/{{$productDetail->image}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{{$productDetail->name}}</p>

                                @if($productDetail->sale==1)
                                    <p class="single-item-price">
                                        <span class="flash-del">${{$productDetail->unit_price}}đ</span>
                                        <span class="flash-sale">${{$productDetail->promotion_price}}đ</span>
                                    </p>
                                @else
                                    <p class="single-item-price">
                                        <span>${{$productDetail->unit_price}}đ</span>
                                    </p>
                                @endif

                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms
                                    id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                                    repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum
                                    necessitatibus saepe.</p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Options:</p>
                            <div class="single-item-options">
                                <a class="add-to-cart pull-left"
                                   href="{{route('add-to-cart',['id'=>$productDetail->id])}}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Description</a></li>
                            <li><a href="#tab-reviews">Reviews (0)</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                            <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                                exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
                                consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil
                                molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
                        </div>
                        <div class="panel" id="tab-reviews">
                            <p>No Reviews</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Related Products</h4>

                        <div class="row">
                            @foreach($productsRelate as $product)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($product->sale==1)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}"><img
                                                        src="source/image/product/{{$product->image}}" height="250px"
                                                        alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$product->name}}</p>
                                            @if($product->sale==1)
                                                <p class="single-item-price">
                                                    <span class="flash-del">${{$product->unit_price}}đ</span>
                                                    <span class="flash-sale">${{$product->promotion_price}}đ</span>
                                                </p>
                                            @else
                                                <p class="single-item-price">
                                                    <span>${{$product->unit_price}}đ</span>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="{{route('add-to-cart',['id'=>$product->id])}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary"
                                               href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}">Details
                                                <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection