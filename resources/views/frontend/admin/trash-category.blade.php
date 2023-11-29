@extends('frontend.admin.layouts.main')
@section('main-section')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories</h4>
                        @if(session('error'))
                        <p class="text-danger">{{session('error')}}</p>
                        @else
                        <p class="text-success">{{session('success')}}</p>
                        @endif
                        <a href="{{url('/')}}/view-trash-category" class="btn btn-success">Trash</a> 
                    </div>
                    <div class="card-body" id="categories_table">
                        <table class="table table-bordered ">
                            <thead class="bg-secondary">
                                <tr class="text-white">
                                    <th>Category Name</th>
                                    <th>SubCategory</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th> 
                                    
                                    


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->subcategoryname}}</td>
                                            <td style="max-width: 200px;  white-space: normal;">{{$item->description}}</td>
                                            <td><img src="{{('upload/images/'.$item->image) }}" alt="Image"  width="50px" height="50px"></td>
                               
                                            <td>
                                            <a href="{{route('edit.category',['category_id'=>$item->category_id])}}" class="btn btn-info ">Edit</a>
                                              
                                           
                                              <a href="{{route('delete.permanent.category',['category_id'=>$item->category_id])}}" class="btn btn-danger">Delete</button>
  
                                              <a href="{{route('restore.category',['category_id'=>$item->category_id])}}" class="btn btn-success">Restore</button>
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