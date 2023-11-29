@extends('frontend.layouts.main')
@section('main-section')
@extends('frontend.layouts.header')
@extends('frontend.layouts.navbar')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-top: 50px; margin-right:140px; border:none;">
                <div class="card-body">
                    <div class="container" id="cart"  style="margin-left: 60px;">
                       @php
                       $total = 0;
                       @endphp
                        @foreach($cartProducts as $item)
                            @php  
                            $total += $item->price * $item->quantity
                            @endphp
                            <div style="position: relative;" class="cart-data"> 
                            <input type="hidden" value="{{$item->id}}" class="card-id"> 
                                <h5>{{ $item->name }}</h5>
                                <p>Price: NRS. {{ $item->price }}</p>
                                <p>Quantity:
                                <div class="input-group mb-3" style="width: 130px; position:absolute; left:80; top:65;">
                                <button class="input-group-text decrement-btn bg-white updateQty" style="border-top-left-radius:15px;border-bottom-left-radius:15px;">-</button>
                                <input type="text" class="form-control bg-white text-center input-qty" value="{{ $item->quantity }}" disabled>
                                <button class="input-group-text increment-btn bg-white updateQty" style="border-top-right-radius:15px;border-bottom-right-radius:15px;">+</button>
                                </div>
                                </p>
                                <img src="{{('upload/images/'.$item->image)}}"  width="100px" height="100px" style="position:absolute; right:250; top:0;">
                                <button class="btn btn-danger delete-btn"  style="position:absolute; right:100; top:50;">Delete</button>
                                <hr>
                                
                            </div>
                        @endforeach

                                <div class="footerCart"  style="border-top:1px solid rgba(128,128,128,0.3);height:300px;position:fixed;top:73vh;width:1000px;background:#fff;z-index:1000;">
                                 
                                <h4 class="d-inline-block">Estimated Total: </h4>
                                <span style="margin: 0 0 0 0px;" class="fw-bold" id="price">Rs&nbsp {{$total}} </span>
                                <div class="mt-5" style="width:360px;">
                                <a href="/checkout" class="btn btn-default fw-bold" style="border:1px solid rgba(128,128,128,0.7);width:100%;">Proceed to checkout</a>
                                </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection