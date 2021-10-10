<?php



use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Discuss\DiscussController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\SubQuestionController;
use App\Http\Livewire\Articles\AddArticleComponent;
use App\Http\Livewire\Articles\ArticleComponent;
use App\Http\Livewire\Articles\EditArticleComponent;
use App\Http\Livewire\Articles\SingleArticleComponent;
use App\Http\Livewire\FollowComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\UserStoryComponent;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('profile/@{profile}', ProfileComponent::class)->name('profile');
Route::get('profile/@{profile}/articles', ProfileComponent::class);
Route::get('profile/@{profile}/discusses', ProfileComponent::class);


Route::group(['middleware'=>'auth'],function (){
Route::post('@{profile}/image',UserStoryComponent::class)->name('user.images');
Route::get('discuss/create', [DiscussController::class,'create'])->name('discuss.create');
Route::get('discuss/{discuss}/cuurentDiscuss/{cuurentDiscuss}', [DiscussController::class,'bestAnswer'])->name('bestAnswer');
Route::post('discuss/{discuss}/subscriptions', [DiscussController::class,'subscriptions'])->name('discuss.subscriptions');
Route::delete('discuss/{discuss}/subscriptions', [DiscussController::class,'unSubscriptions'])->name('discuss.subscriptions.remove');
Route::get('/article/{article}/edit', EditArticleComponent::class)->name('edit.article');
Route::get('/article/add', AddArticleComponent::class)->name('add.article');

});


Route::get('login/google', [LoginWithGoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::get('discuss', [DiscussController::class,'index'])->name('discuss');
Route::post('discuss/store', [DiscussController::class,'store'])->name('discuss.store');
Route::get('discuss/{discuss}', [DiscussController::class,'show'])->name('discuss.show');
Route::post('discuss/{discuss}/replay', [DiscussController::class,'replay'])->name('discuss.replay');

Route::get('/',[IndexController::class,'index']);

Route::get('/articles', ArticleComponent::class)->name('articles');
Route::get('/article/{article}', SingleArticleComponent::class)->name('single.article');


Route::get('/log', function () {

//    \App\Models\User::chunk(10,function ($users){
//        $num = 1;
//        echo "<div style='background:black;color:white;margin: 10px;border-radius: 10px'>";
//       foreach ($users as $user) {
//           echo $num . '-' . $user->name .'<hr>';
//           $num++;
//       }
//       echo "</div>";
//    });
    return \auth()->loginUsingId(29);
     auth()->logout();
});


Route::group(['prefix'=>'admin/dashboard',['as'=>'admin']],function (){


    Route::get('profile/@{profile}/follow', FollowComponent::class);

    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::resource('/questions',\App\Http\Controllers\QuestionController::class);

    // sub question
    Route::get('/questions/{question}/create',[SubQuestionController::class,'create'])->name('sub_question.create');
    Route::post('/questions/{question}/store',[SubQuestionController::class,'store'])->name('sub_question.store');
    Route::delete('/subQuestion/{sub_question}',[SubQuestionController::class,'destroy'])->name('sub_question.destroy');
    Route::get('/subQuestion/{sub_question}/edit',[SubQuestionController::class,'edit'])->name('sub_question.edit');
    Route::put('/subQuestion/{sub_question}',[SubQuestionController::class,'update'])->name('sub_question.update');
});


Route::post('file',function (){
    $name = request()->file('image')->extension();

    $img = \Illuminate\Support\Str::random().'.'.$name;

    request()->file('image')->storeAs(
        'public/images', $img
    );

    dd('done');

})->name('file');
