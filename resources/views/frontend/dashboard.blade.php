@extends('frontend.layouts.main')
@section('main-section')
@extends('frontend.layouts.header')
@extends('frontend.layouts.categorynavbar')
@extends('frontend.layouts.navbar')
    <!-- <div class="container mt-4"> 
        <div class="row"> 
        <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3"> -->
            <!-- Product 1 -->
            <h2 style="background-color:white; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><center>Brand Partners</center></h2>
            @foreach($categories as $item)  
            <div class="col">
                <div class="product-item card mb-2">
                    <!-- <h3>{{$item->name}}</h3> -->
                    <!-- <p>{{$item->description}}</p> -->
                   
                    <img src="{{('upload/images/'.$item->image) }}" alt="Image" style="width: 1000px; margin-left: 100px; margin-right: 100px; margin-top: 20px; height: 500px;">

                </div>
            </div> 
             @endforeach



@endsection 