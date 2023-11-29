@extends('frontend.admin.layouts.main')
@section('main-section')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products</h4>
                        @if(session('error'))
                        <p class="text-danger">{{session('error')}}</p>
                        @else
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                    </div>
                    <div class="card-body" id="products_table">
                        <table class="table table-bordered ">
                            <thead class="bg-secondary">
                                <tr class="text-white">
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th> 
                                    
                                    


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->category_id}}</td>
                                            <td>{{$item->subcategory}}</td>
                                            <td>{{$item->description}}</td>
                                            
                                            
                                            <td>
                                                @php
                                                
                                                $image = DB::table('products')->where('product_id',$item->product_id)->first(); 
                                                $images = explode('|', $image->image);
                                                @endphp
                                                @foreach($images as $img)
                                                <img src="{{('upload/images/'.$img)}}" alt="" srcset="" width="50px" height="50px">
                                                @endforeach
                                            </td>

                                            <td>
                                                <a href="{{route('edit.product',['product_id'=>$item->product_id])}}" class="btn btn-info ">Edit</a>
                                              
                                                <a href="{{ route('delete.permanent',['product_id'=>$item->product_id])}}" class="btn btn-danger">Delete</a>


                                            <a href="{{route('restore.product',['product_id'=>$item->product_id])}}" class="btn btn-success">Restore</button>
                                            </td>

                                        </tr>
                                        @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection