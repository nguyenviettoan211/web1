@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{$categoryDetail->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('index')}}">Home</a> / <span>Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($allCategory as $category)
                            <li
                                    @if($category->id == $categoryDetail->id)
                                    class="is-active"
                                    @endif
                            ><a href="{{route('category',['id'=>$category->id,'name'=>str_slug($category->name)])}}">{{$category->name}}</a></li>
                                @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>{{ucwords($categoryDetail->name)}}</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($productCategoryDetail)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($productCategoryDetail as $product)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($product->promotion_price != 0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}"><img src="source/image/product/{{$product->image}}" height="250px" alt=""></a>
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
    <div class="row center">
        {{$productCategoryDetail->links()}}
    </div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
    @endsection