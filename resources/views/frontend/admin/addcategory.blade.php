@extends('frontend.admin.layouts.main')
@section('main-section')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center" style="color:black;">Add Categories</h4>
                    </div>
                    <div class="card-body"> 
                        <form action="{{url('/')}}/addCategory" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row"> 
                                <div class="col-md-6">
                                    <label for="">Category</label>
                                    <input type="text" name="category_name"  class="form-control" placeholder="Enter category name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Sub-Category</label>
                                    <input type="text" name="subcategory_name"  class="form-control" placeholder="Enter category name" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" placeholder="Enter description" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="image" id="" class="form-control">
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
