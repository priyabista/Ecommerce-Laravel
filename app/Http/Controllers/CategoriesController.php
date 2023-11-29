<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Categories;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){ 
   $categories = Categories::all();
   $products = Product::all(); 
   $data = compact('categories','products'); 
   return view('frontend.dashboard')->with($data);
    }
    
    public function addCategory(){
        return view('frontend.admin.addcategory');
    }

    public function viewCategories($id){
       $category_data = Categories::where('category_id',$id)->get();
       $categories = Categories::all();
       $data = compact('categories','category_data');
       return view('frontend.categories')->with($data); 
    // echo "<pre>";
    // print_r($category_data-> toArray());
    }


    public function storeCategory(Request $request){ 
    $category = new Categories();
    $category -> name = $request['category_name'];
    $category -> subcategoryname = $request['subcategory_name'];
    $category -> description = $request['description'];
    if($request -> hasFile('image')){
        $file = $request-> file('image');
        $extension = $file -> getClientOriginalExtension(); 
        $filename = time().'.'.$extension;
        $file->move('upload/images', $filename);
    $category -> image = $filename;

    }else{
        $category -> image = ''; 
    }
    $category -> save();
    return redirect()-> back();

    // echo "<pre>";
    // print_r($request -> toArray());

    }

    public function showCategory(){
        $categories = Categories::all(); 
       $data = compact('categories');  
       if(session()->has('user') && session('user')['role']===0){
        return view('frontend.admin.allCategories')->with($data);
       }else{
        return view('frontend.allCategories')->with($data);
       }
    }

    public function editCategory($id){
        try{
             $category = Categories::find($id);
          //    echo "<pre>";
          //    print_r($product -> toArray());//For models retrieval //echo<pre> shows as it is same as input
              
            if(!is_null($category)){
               $url = url('/edit-category').'/'.$id;
               $data = compact('category','url');
               return view('frontend.admin.editcategory')->with($data);
            }else{  
              return redirect()-> back() -> with('error', 'Invalid Category');
            }
        }catch(Exception $e){
             return redirect()-> back() -> with('error', 'Error fetching data');
        }
      } 
  
      public function updateCategory(UpdateCategoryRequest $request, $id){
        
    // echo "<pre>";
    // print_r($request -> toArray());
          try{
          $category = Categories::find($id);
          if(!is_null($category)){
            $category -> name = $request['category_name'];
            $category -> subcategoryname = $request['subcategory_name'];
            $category -> description = $request['description'];
            if($request -> hasFile('image')){
                $file = $request-> file('image');
                $extension = $file -> getClientOriginalExtension(); 
                $filename = time().'.'.$extension;
                $file->move('upload/images', $filename);
            $category -> image = $filename;
        
            }else{
                $category -> image = ''; 
            }
              $category -> save();
              return redirect()-> back() -> with('success', 'Category Updated Successfully');
              }
              
          else{
              return redirect()-> back() -> with('error', 'Invalid Category');
          }
  
              }catch(Exception $ex){
                  return redirect()-> back() -> with('error', 'Error fetching data'.$ex->getMessage());
              }
          }

    public function deleteCategories($id){
        try{
           $category = Categories::find($id);
           if(!is_null($category)){
            $category -> delete();
            return redirect()-> back() -> with('success', 'Category Deleted Successfully');
           }else{
            return redirect()-> back() -> with('error', 'Invalid Category');
           }
          
         }
        catch(Exception $ex){
            return redirect()-> back() -> with('error', 'Error Deleting data'.$ex->getMessage());
        }
}

public function viewTrashCategory(){
    $categories = Categories::onlyTrashed()->get();
    $data = compact('categories');
    return view('frontend.admin.trash-category')->with($data);
}

public function deleteCategoriesPermanently($id){
    try{
        $category = Categories::withTrashed()->find($id);
        if(!is_null($category)){
         $category -> forceDelete();
         return redirect()-> back() -> with('success', 'Category Deleted Permanently');
        }else{
         return redirect()-> back() -> with('error', 'Invalid Category');
        }
       
      }
 catch(Exception $ex){
     return redirect()-> back() -> with('error', 'Error Deleting data'.$ex->getMessage());
 }
}

public function restoreCategories($id){
    try{
        $category = Categories::withTrashed()->find($id);
        if(!is_null($category)){
         $category -> restore();
         return redirect()-> back() -> with('success', 'Category Restored');
        }else{
         return redirect()-> back() -> with('error', 'Invalid Category');
        }
       
      }
 catch(Exception $ex){
     return redirect()-> back() -> with('error', 'Error Restoring data'.$ex->getMessage());
 }
}



}
