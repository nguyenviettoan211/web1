@include('error')
@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đăng kí</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="{{route('index')}}">Home</a> / <span>Đăng kí</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <form action="{{route('post-sign-up')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3"></div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                                @endforeach
                        </div>
                        @endif
                    @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                        @endif
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>
                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Fullname*</label>
                            <input type="text" id="fullname" name="fullname" required>
                        </div>

                        {{--<div class="form-block">
                            <label for="address">Address*</label>
                            <input type="text" id="address" name="address" value="Street Address" required>
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>--}}
                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="text" id="password" name="password" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Re password*</label>
                            <input type="text" id="repassword" name="repassword" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
    @endsection