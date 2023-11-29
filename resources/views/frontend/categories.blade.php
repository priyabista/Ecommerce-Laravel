@extends('frontend.layouts.main')
@section('main-section')
@extends('frontend.layouts.header')
@extends('frontend.layouts.categorynavbar')
@extends('frontend.layouts.navbar')

  <div class="container mt-4"> 
        <div class="row"> 
        <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3">
            <!-- Product 1 -->
          
            @foreach($category_data as $item)
            
            <div class="col">
                <div class="product-item card mb-2">
                    <h3>{{$item->subcategoryname}}</h3> 
                   <p>{{$item->description}}</p>
                   <img src="{{ asset('upload/images/' . $item->image) }}" alt="Image" style="width: 200px;  height: 250px;">
                    

                </div>
            </div> 
         
             @endforeach

            
        </div>
    </div>       
        </div>
    </div>

    @endsection 