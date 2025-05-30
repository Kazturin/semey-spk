<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('language', function (Request $request) {
    \Illuminate\Support\Facades\App::setLocale($request->locale);
     session()->put('locale', $request->locale);

     $parsedUrl = parse_url(url()->previous());
     if (isset($parsedUrl['path'])) {
        $path = $parsedUrl['path'];
        $path = preg_replace('/^\/\w{2}\//', '/' . $request->locale . '/', $path);

        $redirectUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $path;
     }
     else{
        $redirectUrl = '/';
     }
  return redirect()->to($redirectUrl);
})->name('language');

Route::group([
    'prefix' => '{locale?}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => Localization::class
], function () {
   Route::get('/', [SiteController::class,'index'] );
   Route::get('/search', SearchController::class)->name('search');
   Route::get('/page/{page:slug?}',[PageController::class,'index'])->name('page');
   Route::get('/list/{pageList:slug}',[PageController::class,'listItem'])->name('list.item');
   Route::get('/feedback',[FeedbackController::class,'index'])->name('feedback');
//    Route::get('/files/{pageFile}',FileController::class)->name('files');
//    Route::get('/search', SearchController::class)->name('search');

   // Route::get('/news',[NewsController::class,'index'])->name('news');
   // Route::get('/news/{news:slug}',[NewsController::class,'show'])->name('news.show');
});

Route::get('/test', [SiteController::class,'test'] );
Route::post('/feedback/store',[FeedbackController::class,'store'])->name('feedback.store');
// Route::get('/', function () {
//     // echo 'Текущая память до вида: ' . (memory_get_usage() / 1024 / 1024) . ' MB<br>';
//     // $view = view('welcome');
//     // echo 'Текущая память после вида: ' . (memory_get_usage() / 1024 / 1024) . ' MB<br>';
//     // echo 'Пиковая память: ' . (memory_get_peak_usage() / 1024 / 1024) . ' MB<br>';
//     return view('welcome');
// });
