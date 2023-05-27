<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\User\InscriptionController;
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



Route::get('/', [App\Http\Controllers\TemplateController::class, 'index']);
Route::resource('front',TemplateController::class);
Route::resource('about',AboutUsController::class);
Route::resource('contact',ContactUsController::class);
Route::get('/course/details/{id}', 'CoursesController@details')->name('course.details');
Route::get('/home/categories/{id}',[App\Http\Controllers\User\CategoryController::class,'Cat'])->name('home.categories');
Route::get('/search',[App\Http\Controllers\TemplateController::class,'search'])->name('home.search');
//Route::resource('user',RegisteredUserController::class);
// Route::get('/user/dashboard', function () {
//     return view('/user/dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::post('/user/dashboard/update_wishlist',[App\Http\Controllers\User\CourseController::class, 'updateWishlist']);
Route::get('/user/dashboard/total_wishlist',[App\Http\Controllers\User\CourseController::class, 'totalWishlist']);
Route::post('/user/dashboard/lesson',[App\Http\Controllers\User\LessonsController::class, 'fetchlesson']);
Route::delete('/story/{id}',[App\Http\Controllers\User\StoryController::class,'destroy']);
Route::middleware(['auth'])->name('dashboard')->group(function(){
    Route::get('/user/dashboard',[HomeController::class, 'index']); 
    Route::get('/user/wishlist',[WishListController::class, 'index'])->name('.user.wishlist');
    Route::post('/user/course/join/{course_id}', [App\Http\Controllers\User\CourseController::class, 'joinCourse'])->name('.course.join');
    Route::post('/user/course/payment/{course_id}', [App\Http\Controllers\User\CourseController::class, 'simulateFakePayment'])->name('.payment');
    Route::get('/user/mycourses', [InscriptionController::class, 'index'])->name('.user.courses');
    Route::get('/user/profile',[App\Http\Controllers\User\StudentController::class,'index'])->name('profile.index');
    Route::post('/user/getForm',[App\Http\Controllers\User\StudentController::class,'Form'])->name('.profile.Form');
    Route::post('/user/updateProfile',[App\Http\Controllers\User\StudentController::class,'Profile'])->name('.profile.update');
    Route::post('/comments',[App\Http\Controllers\CommentaireController::class,'storecomments'])->name('.comments');
    Route::post('/replies',[App\Http\Controllers\ReplyController::class,'storereplies'])->name('.reply');
    Route::get('/comments',[App\Http\Controllers\CommentaireController::class,'index'])->name('.comments.index');
    Route::get('/get_certificate',[App\Http\Controllers\User\CertificatController::class,'checkCertificate'])->name('.getCertificat');
    Route::get('/certificat/{id}',[App\Http\Controllers\User\CertificatController::class,'generateCertificate'])->name('.certificat');
    Route::get('/user/about',[App\Http\Controllers\AboutUsController::class,'about']);
    Route::get('/user/category/{id}',[App\Http\Controllers\User\CategoryController::class,'index'])->name('.categories');
    Route::get('/user/stories',[App\Http\Controllers\User\StudentController::class,'stories'])->name('.user.stories');
    Route::post('/stories',[App\Http\Controllers\User\StoryController::class,'storestory'])->name('.story');
    Route::get('/user/events',[App\Http\Controllers\User\ReadEventController::class,'show'])->name('.events');
    Route::get('/user/readevent/{id}',[App\Http\Controllers\User\ReadEventController::class,'read'])->name('.readevent');
    Route::get('/user/tests',[App\Http\Controllers\User\TestController::class,'index'])->name('.tests');
    Route::get('/user/passtest/{id}',[App\Http\Controllers\User\QuestionController::class,'index'])->name('.passtest');
    Route::post('/user/checkanswer',[App\Http\Controllers\User\QuestionController::class,'checkAnswer'])->name('.checkanswer');

});


require __DIR__.'/auth.php';
//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //login route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('dashboard','HomeController@index')->name('dashboard');
        Route::resource('courses',courseController::class);
        Route::resource('categories',CategorieController::class);
        Route::resource('students',StudentController::class);
        Route::resource('admins',AdminController::class);
        Route::resource('contacts',ContactController::class);
        Route::resource('events',EventController::class);
        Route::resource('tests',TestController::class);
        Route::get('/tests/{testId}/questions','QuestionController@index')->name('questions.index');
        Route::get('/tests/create/{testId}','QuestionController@create')->name('questions.create');
        Route::resource('questions', QuestionController::class)->except(['index','create']);
        Route::get('/questions/{questionId}/answers', 'AnswerController@index')->name('answers.index');
        Route::get('answers/create/{questionId}','AnswerController@create')->name('answers.create');
        Route::resource('answers', AnswerController::class)->except(['index','create']);
        Route::get('/courses/{courseId}/chapters', 'ChaptersController@index')->name('chapters.index');
        Route::get('chapters/create/{courseId}','ChaptersController@create')->name('chapters.create');
        Route::resource('chapters', ChaptersController::class)->except(['index','create']);
        Route::get('/chapters/{chapterId}/lessons', 'LessonsController@index')->name('lessons.index');
        Route::get('lessons/create/{chapterId}','LessonsController@create')->name('lessons.create');
        Route::resource('lessons', LessonsController::class)->except(['index','create']);

    });
    
    Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});
