@extends('frontend.admin.layouts.main')
@section('main-section')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center" style="color:black;">Edit Product</h4>
                        @if(session('error'))
                        <p class="text-danger">{{session('error')}}</p>
                        @else
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                    </div>
                    <div class="card-body"> 
                        <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row"> 
                                <div class="col-md-6">
                                    <label for="">Product</label>
                                    <input type="text" name="product_name" value="{{$product->name}}"  class="form-control" placeholder="Enter product name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type="text" name="price" value="{{$product->price}}"  class="form-control" placeholder="Enter product name" required>
                                </div>
                                <div class="col-md-12">
                                          <label for="exampleSelect">SubCategory:</label>
                                          <select class="form-select" id="exampleSelect" name="subcategory_name">
                                              <option value="{{$product->subcategory}}">{{$product->subcategory}}</option>
                                              @foreach($categories as $item)
                                              <option value="{{$item->subcategoryname}}">  
                                              {{$item-> subcategoryname}}
                                              </option> 
                                              @endforeach
                                          </select>                
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description"  id="" placeholder="Enter description" rows="3" class="form-control">{{$product->description}}</textarea>
                                </div>
                                <div class="col-md-12">
                                <label for="">Product Images</label>
                                        @php 
                                        $images = explode('|', $product->image);
                                        @endphp
                                            @foreach($images as $image) 
                                            <img src="{{url('upload/images').'/'.$image}}" alt="" srcset="" width="50px" height="50px">
                                            @endforeach 
                                            </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="hidden" name="image" value="{{$product->image}}">
                                    <input type="file" class="form-control" name="image[]" multiple>
                                </div>
                                <div class="col-md-12">
                                          <label for="exampleSelect">Select an option:</label>
                                          <select class="form-select" id="exampleSelect" name="category_id">
                                          <option value="{{$product->category_id}}">{{$product->category_id}}</option>
                                              @foreach($categories as $item)
                                              <option value="{{$item->category_id}}" >
                                              {{$item-> name}}
                                              </option>
                                              @endforeach
                                          </select>                
                                </div>
                          
                                <div class="col-md-12">
                                    <button class="btn btn-info" name="addCategory" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
        </div>
    </div>

@endsection

