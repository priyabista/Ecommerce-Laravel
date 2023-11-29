@extends('frontend.admin.layouts.main')
@section('main-section')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center" style="color:black;">Add Product</h4>
                    </div>
                    <div class="card-body"> 
                        <form action="{{url('/')}}/addProduct" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row"> 
                                <div class="col-md-6">
                                    <label for="">Product</label>
                                    <input type="text" name="product_name"  class="form-control" placeholder="Enter product name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type="text" name="price"  class="form-control" placeholder="Enter price" required>
                                </div>
                                <div class="col-md-12">
                                          <label for="exampleSelect">SubCategory:</label>
                                          <select class="form-select" id="exampleSelect" name="subcategory_name">
                                              <option value="option1">Select SubCategory</option>
                                              @foreach($categories as $item)
                                              <option value="{{$item->subcategoryname}}">  
                                              {{$item-> subcategoryname}}
                                              </option> 
                                              @endforeach
                                          </select>                
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" placeholder="Enter description" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="file" class="form-control" name="image[]" multiple>
                                </div>
                                <div class="col-md-12">
                                          <label for="exampleSelect">Select an option:</label>
                                          <select class="form-select" id="exampleSelect" name="category_id">
                                              <option value="option1">Select Category</option>
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

