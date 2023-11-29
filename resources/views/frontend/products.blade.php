@extends('frontend.layouts.main')
@section('main-section')
@extends('frontend.layouts.header')
@extends('frontend.layouts.categorynavbar')
@extends('frontend.layouts.navbar')

  <div class="container mt-4"> 
        <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-4">
            <!-- Product 1 -->
          
            @foreach($products as $item)
            
            <div class="col mx-6 card mb-4 mt-4" >
            <a class="mx-auto" href="{{route('product.description',['product_id'=>$item->product_id])}}" style="font-family:'Times New Roman', Times, serif; font-size:2ch; text-decoration:none; color:black;">
                <div class="product-item mb-8  card shadow p-4 ">
                   <img src="{{ asset('upload/images/' . $item->image) }}" alt="Image" style="width: 200px; margin-top:20px; height: 250px;" class="mx-auto">
                   <h4 class="mx-auto">{{$item->name}}</h4> 
                   <p class="mx-auto">NPR&nbsp;{{$item->price}}</p>
                </div>
            </a>
                <form action="{{ url('/') }}/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$item->product_id}}" />
                <input type="hidden" name="quantity" value="1" />
                
                <input type="submit" class="btn btn-primary mx-auto d-block" value="Add To Cart">
                </form>
            </div> 
         
             @endforeach

        

            
        </div>
    </div>       
        </div>
    </div>



    @endsection 