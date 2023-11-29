<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Categories;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(){
        $categories = Categories::all();
       $data = compact('categories'); 
        return view('frontend.admin.addproduct')-> with($data);
    }

    public function storeProduct(Request $request){ 
    $product = new Product();  
    $product -> name = $request['product_name'];
    $product -> price = $request['price'];
    $product -> description = $request['description'];
    $product -> subcategory = $request['subcategory_name']; 
    $product -> category_id = $request['category_id'];
    $image = array();
    if($request -> hasFile('image')){
        $files = $request-> file('image'); 
    foreach($files as $file){
        $extension = $file -> getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $image[] = $filename;
        $file->move('upload/images', $filename);  
    $product -> image = implode('|', $image);
    }
    }else{
        $product -> image = '';   
    }
    $product -> save();
    return redirect()-> back();
    // echo "<pre>";
    // print_r($request-> toArray());
    }

    public function showProduct(){
        $products = Product::all(); 
        $categories = Categories::all();
       $data = compact('products', 'categories');  
       if(session()->has('user') && session('user')['role']===0){
        return view('frontend.admin.products')->with($data);
       }else{
        return view('frontend.products')->with($data);
       }
    }

    public function viewProducts($subcategoryname){ 
    $products = DB::table('products')->where('subcategory','=',$subcategoryname)->get();
    $categories = Categories::all();
    $data = compact('products','categories');
    return view('frontend.products')->with($data);
    // echo "<pre>";
    // print_r($products-> toArray());

    }


    public function editProducts($id){
      try{
           $product = Product::find($id);
        //    echo "<pre>";
        //    print_r($product -> toArray());//For models retrieval //echo<pre> shows as it is same as input
            
          if(!is_null($product)){
             $url = url('/edit-product').'/'.$id;
             $categories = Categories::all();
             $data = compact('product', 'categories','url');
             return view('frontend.admin.editproduct')->with($data);
          }else{  
            return redirect()-> back() -> with('error', 'Invalid Product');
          }
      }catch(Exception $e){
           return redirect()-> back() -> with('error', 'Error fetching data');
      }
    } 

    public function showDescription($id)
        {
            $product = Product::find($id);
            // echo "<pre>";
            //    print_r($product -> toArray());
        try{
        
            if(!is_null($product)){
            $url = url('/product-description').'/'.$id;
            $data = compact('product','url');
            return view('frontend.product-description')->with($data);
            return view('frontend.add_to_cart')->with($data);
            }
            else{  
                return redirect()-> back() -> with('error', 'Invalid Product');
            }
        }catch(Exception $e){
        return redirect()-> back() -> with('error', 'Error fetching data');
    }
    }


    public function updateProducts(UpdateProductRequest $request, $id){
        try{
        $product = Product::find($id);
        if(!is_null($product)){
            $product -> name = $request['product_name'];
            $product -> price = $request['price'];
            $product -> description = $request['description'];
            $product -> subcategory = $request['subcategory_name']; 
            $product -> category_id = $request['category_id'];
            $image = array();
            if($request -> hasFile('image')){
                $files = $request-> file('image'); 
            foreach($files as $file){
                $extension = $file -> getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $image[] = $filename;
                $file->move('upload/images', $filename);  
            $product -> image = implode('|', $image);
            }
            }else{
                $product -> image = '';   
            }
            $product -> save();
            return redirect()-> back() -> with('success', 'Product Updated Successfully');
            }
            
        else{
            return redirect()-> back() -> with('error', 'Invalid Product');
        }

            }catch(Exception $ex){
                return redirect()-> back() -> with('error', 'Error fetching data'.$ex->getMessage());
            }
        }

            public function deleteProducts($id){
                try{
                   $product = Product::find($id);
                   if(!is_null($product)){
                    $product -> delete();
                    return redirect()-> back() -> with('success', 'Product Deleted Successfully');
                   }else{
                    return redirect()-> back() -> with('error', 'Invalid Product');
                   }
                  
                 }
            catch(Exception $ex){
                return redirect()-> back() -> with('error', 'Error Deleting data'.$ex->getMessage());
            }
        }

        public function viewTrash(){
            $products = Product::onlyTrashed()->get();
            $data = compact('products');
            return view('frontend.admin.trash-products')->with($data);
        }

        public function deleteProductsPermanently($id){
            try{
                $product = Product::withTrashed()->find($id);
                if(!is_null($product)){
                 $product -> forceDelete();
                 return redirect()-> back() -> with('success', 'Product Deleted Permanently');
                }else{
                 return redirect()-> back() -> with('error', 'Invalid Product');
                }
               
              }
         catch(Exception $ex){
             return redirect()-> back() -> with('error', 'Error Deleting data'.$ex->getMessage());
         }
        }

        public function restoreProducts($id){
            try{
                $product = Product::withTrashed()->find($id);
                if(!is_null($product)){
                 $product -> restore();
                 return redirect()-> back() -> with('success', 'Product Restored');
                }else{
                 return redirect()-> back() -> with('error', 'Invalid Product');
                }
               
              }
         catch(Exception $ex){
             return redirect()-> back() -> with('error', 'Error Restoring data'.$ex->getMessage());
         }
        }

        

}
