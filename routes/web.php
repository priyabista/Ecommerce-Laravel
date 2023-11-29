<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Models\Cart;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoriesController::class, 'index']);

Route::get('/signup', [UserController::class, 'register']);

Route::post('/signup',[UserController::class,  'signup']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'authentication']); 

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/categories', [CategoriesController::class, 'index']); 

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin.check');

Route::get('/logout', [AdminController::class, 'logout']);

Route::get('/addCategory', [CategoriesController::class, 'addCategory'])->middleware('admin.check');

Route::post('/addCategory', [CategoriesController::class, 'storeCategory']);

Route::get('/addProduct', [ProductController::class, 'index'])->middleware('admin.check');

Route::post('/addProduct', [ProductController::class, 'storeProduct']);

Route::get('/products', [ProductController::class, 'showProduct']);

Route::get('/allCategories', [CategoriesController::class, 'showCategory']);

Route::get('/edit-product/{product_id}', [ProductController::class, 'editProducts'])->name('edit.product');

Route::get('/view-product/{subcategoryname}', [ProductController::class, 'viewProducts'])->name('view.product');

Route::get('/view-category/{category_id}', [CategoriesController::class, 'viewCategories'])->name('view.category');

Route::post('/edit-product/{product_id}', [ProductController::class, 'updateProducts'])->name('update.product');

Route::get('/edit-category/{category_id}', [CategoriesController::class, 'editCategory'])->name('edit.category');

Route::post('/edit-category/{category_id}', [CategoriesController::class, 'updateCategory'])->name('update.category');

Route::get('/delete-product/{product_id}', [ProductController::class, 'deleteProducts'])->name('delete.product');

Route::get('/delete-product-permanent/{product_id}', [ProductController::class, 'deleteProductsPermanently'])->name('delete.permanent');

Route::get('/restore-product/{product_id}', [ProductController::class, 'restoreProducts'])->name('restore.product');

Route::get('/view-trash', [ProductController::class, 'viewTrash'])->name('view.trash');

Route::get('/delete-category/{category_id}', [CategoriesController::class, 'deleteCategories'])->name('delete.category');

Route::get('/delete-category-permanent/{category_id}', [CategoriesController::class, 'deleteCategoriesPermanently'])->name('delete.permanent.category');

Route::get('/restore-category/{category_id}', [CategoriesController::class, 'restoreCategories'])->name('restore.category');

Route::get('/view-trash-category', [CategoriesController::class, 'viewTrashCategory'])->name('view.trash.category');

Route::get('/product-description/{product_id}', [ProductController::class, 'showDescription'])->name('product.description');

Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('add.add_to_cart');

Route::get('/cart',  [CartController::class, 'showCart']);

Route::get('/view-order', [CartController::class, 'viewOrder']);

Route::post('/update-cart/{id}', [CartController::class, 'updateCart']);

Route::get('/add_to_cart', [CartController::class, 'calculateTotalForUsers']);

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.items');

Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart']);

Route::post('/place-order', [OrderController::class, 'makeOrder']);

Route::any('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');









