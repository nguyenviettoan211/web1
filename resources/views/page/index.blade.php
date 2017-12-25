@extends('master')
@section('content')
    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer" >
                    <div class="banner" >
                        <ul>
                            @foreach($allSlide as $slide)
                                <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                    style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                         data-zoomstart="undefined" data-zoomend="undefined"
                                         data-rotationstart="undefined"
                                         data-rotationend="undefined" data-ease="undefined"
                                         data-bgpositionend="undefined"
                                         data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                         data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                         data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                             data-bgposition="center center" data-bgrepeat="no-repeat"
                                             data-lazydone="undefined"
                                             datasrc="source/image/slide/{{$slide->image}}"
                                             data-src="source/image/slide/{{$slide->image}}"
                                             style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($newProducts)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($newProducts as $product)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        @if($product->sale==1)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif

                                        <div class="single-item-header">
                                            <a href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}"><img src="source/image/product/{{$product->image}}" alt="" height="250px"></a>
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
                            <div class="row">{{$newProducts->links()}}</div>

                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Promotion Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($promotionProducts)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($promotionProducts as $product)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        @if($product->sale==1)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}"><img src="source/image/product/{{$product->image}}" alt="" height="250px"></a>
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
                                            <a class="add-to-cart pull-left" href="{{route('add-to-cart',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('product',['id'=>$product->id,'name'=>str_slug($product->name)])}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                            <div class="row">
                                {{$promotionProducts->links()}}
                            </div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
    @endsection

@section('script')
    <!--customjs-->
    <script src="source/assets/dest/js/custom2.js"></script>
    <script>
        $(document).ready(function($) {
            $(window).scroll(function(){
                if($(this).scrollTop()>150){
                    $(".header-bottom").addClass('fixNav')
                }else{
                    $(".header-bottom").removeClass('fixNav')
                }}
            )
        })
    </script>
    @endsection