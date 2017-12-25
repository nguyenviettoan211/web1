@extends('master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Search Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($product)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($product as $product)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($product->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif

                                            <div class="single-item-header">
                                                <a href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}"><img src="source/image/product/{{$product->image}}" alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$product->name}}</p>
                                                <p class="single-item-price">
                                                    @if($product->promotion_price == 0)
                                                        <span class="single-item-price">{{number_format($product->unit_price)}} VNĐ</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($product->unit_price)}}</span>
                                                        <span class="flash-sale">{{number_format($product->promotion_price)}} VNĐ</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{route('add-to-cart',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div> <!-- .beta-products-list -->


                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection