@extends('frontend.admin.layouts.main')
@section('main-section')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center" style="color:black;">Edit Categories</h4>
                    </div>
                    <div class="card-body"> 
                    <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row"> 
                                <div class="col-md-6">
                                    <label for="">Category</label>
                                    <input type="text" name="category_name" value="{{$category->name}}"  class="form-control" placeholder="Enter category name" required>
                                </div>
                                <div class="col-md-6">
                                <label for="exampleSelect">SubCategory:</label>
                                <input type="text" name="subcategory_name" value="{{$category->subcategoryname}}"  class="form-control" placeholder="Enter category name" required>     
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" placeholder="Enter description" value="{{$category->description}}" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12">
                                <label for="">Category Images</label>
                                        @php 
                                        $images = explode('|', $category->image);
                                        @endphp
                                            @foreach($images as $image) 
                                            <img src="{{url('upload/images').'/'.$image}}" alt="" srcset="" width="50px" height="50px">
                                            @endforeach 
                                            </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="hidden" name="image" value="{{$category->image}}">
                                    <input type="file" class="form-control" name="image">
                                </div>
                          
                                <div class="col-md-12">
                                    <button class="btn btn-info" name="addCategory"  type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
        </div>
    </div>

@endsection
