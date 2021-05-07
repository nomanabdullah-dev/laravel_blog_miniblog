<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');

//Front End Routes
Route::get('/', [FrontEndController::class,'home'])->name('website');
Route::get('/about', [FrontEndController::class,'about'])->name('website.about');
Route::get('/category/{slug}', [FrontEndController::class,'category'])->name('website.category');
Route::get('/tag/{slug}', [FrontEndController::class,'tag'])->name('website.tag');
Route::get('/contact', [FrontEndController::class,'contact'])->name('website.contact');
Route::get('/post/{slug}', [FrontEndController::class,'post'])->name('website.post');

//Front End contact Route
Route::post('/contact',[FrontEndController::class,'send_message'])->name('website.contact');

//Admin Panel Routes
Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
    Route::resource('user', UserController::class);

    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'profile_update'])->name('user.profile.update');

    //Setting
    Route::get('setting',[SettingController::class,'edit'])->name('setting.index');
    Route::post('setting',[SettingController::class,'update'])->name('setting.update');

    //Contact message
    Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
    Route::get('/contact/show/{id}', [ContactController::class,'show'])->name('contact.show');
    Route::delete('/contact/delete/{id}', [ContactController::class,'destroy'])->name('contact.destroy');

    Route::get('/logout', [DashboardController::class,'logout'])->name('logout');
});

// Route::get('/test', function(){
//     $posts = App\Models\Post::all();
//     $id = 76;

//     foreach ($posts as $post) {
//         $post->image = "https://picsum.photos/600/400?random=".$id;
//         $post->save();
//         $id++;
//     }
//     return $posts;
// });
