@extends('frontend.layouts.main')
@section('main-section')
@extends('frontend.layouts.header')
@extends('frontend.layouts.navbar')


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="container" style="margin-left: 60px;">
        @php 
        $images = explode('|', $product->image);
        @endphp
            @foreach($images as $image) 
            <img src="{{url('upload/images').'/'.$image}}" alt="" srcset="" width="500px" height="400px" style="margin-top:50px;  margin-bottom:50px;">
            @endforeach     
      </div>
    </div>

    <div class="col-md-6">
      <div class="card" style="margin-top: 50px; margin-right:140px; border:none;">
        <div class="card-body">
           <h5>{{$product->name}}</h5><hr>
          <h5 class="card-text">NRS.</h5><br>
          
            <div class="input-group mb-3" style="width: 130px;">
                <button class="input-group-text decrement-btn bg-white  updateQty" style="border-top-left-radius:15px;border-bottom-left-radius:15px;">-</button>
                <input type="text" class="form-control bg-white text-center input-qty" value="1" disabled>
                <button class="input-group-text increment-btn bg-white updateQty" style="border-top-right-radius:15px;border-bottom-right-radius:15px;">+</button>
            </div>
            
            <div class="row ">
                            <div class="col-md-12 mx-auto d-block">
                             <button class="btn btn-default  px-4 addToCartBtn" onclick="openCart()" style="border:1px solid rgba(128,128,128,0.6);height:60px;width:100%;" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                           
            </div>
                            
                        <hr>
                        <h6>Product Description:</h6>
                        
                        <p><?= $product['description']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>  


@endsection