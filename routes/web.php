<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\SitePageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductController;
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
Route::view('/', 'landing');
Route::get('/index', [SitePageController::class, 'index']);
Route::view('/map', 'map');
Route::get('/test', function (\App\Helpers\Telegram $telegram){
//    $replyMarkup3 =[
//        'keyboard' =>[ [ [
//            'text'=>'Выбрать местоположения',
//            'request_location'=>true,
//        ]]],
//        'resize_keyboard'=>true,
//        'one_time_keyboard'=>true,
//    ];
//    dd($telegram->sendLocation('1958207276', 'Выберите локацию', $replyMarkup3));
//    //\Illuminate\Support\Facades\Cache::forget('test');
    dd([\Illuminate\Support\Facades\Cache::get('testa'),
        \Illuminate\Support\Facades\Cache::get('aasd'),]);
//    $description = 'Оплата за Toyota Camry';
  //$t =  $telegram->sendInvoice('1958207276', 'Toyota Camry', $description, 400000);

//    $media = [];
//        $media[] = ['type' => 'photo', 'media' => 'https://primeengine.ru/storage/images/landing/rent.png'];
//
//    //$telegram->sendMediaGroup('1958207276', $media);
//    $message = 'Вашему коллеге <a href="https://t.me/devpovyshev">Андрей Федорв</a> подтвердили отпуск'.PHP_EOL.
//    'с 01.11.2022 по 14.11.2022'.PHP_EOL;
//    $buttons= [
//        'inline_keyboard' => [
//            [
//                [
//                    'text' => 'Подтвердить',
//                    'callback_data' => 'фыв'
//                ],
//                [
//                    'text' => 'Отклонить',
//                    'callback_data' => 'фыв'
//                ],
//            ]
//        ]
//    ];
//    $telegram->sendMessage('1958207276', $message);
//    $message = "Менеджер Александр взял заказ в работу";
//    $telegram->replyMessage('-1001765252937', $message, 151);
});
Route::any('/t', [TelegramController::class, 'test']);
Route::any('/webhook', [TelegramController::class, 'weebhook']);
Route::post('api/request/get/access', function (\Illuminate\Http\Request $request, \App\Helpers\Telegram $telegram){
    $message = 'Новый запрос на доступ от '.$request->input('email');
    $telegram->sendMessage('1958207276', $message);
    \Illuminate\Support\Facades\DB::table('access_request')->insert([
        'email' => $request->input('email'),
        'type' => $request->input('type'),
        'created_at' => (new \DateTime())->modify('+3 hours')->format('Y-m-d H:i:s')]);

});

Route::view('/service', 'service');
Route::get('/services', [SitePageController::class, 'services']);
Route::get('/services/{slug}', [SitePageController::class, 'category']);
Route::get('/services/{category_slug}/{service_slug}', [SitePageController::class, 'service']);
Route::view('/jobs', 'jobs');
Route::view('/job', 'job');
Route::get('/contacts', [SitePageController::class, 'contacts']);
Route::get('/company', [SitePageController::class, 'company']);
//Route::view('/contacts', 'contacts');
//Route::view('/company', 'company');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/registration', [LoginController::class, 'registration'])->name('registration');
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/registrate', [LoginController::class, 'registrate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function (){
    Route::get('/', function (){
        return redirect()->route('orders.index');
    });
    Route::resource('orders', OrderController::class);
    Route::post('/api/status-change', [OrderController::class, 'changeStatus']);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('products', ProductController::class);

    Route::get('/site', [SiteController::class, 'banner']);
    Route::put('/banner/update', [SiteController::class, 'bannerUpdate']);
//    Route::view('/site', 'admin.site.index');
    Route::get('/company', [SiteController::class, 'company']);
    Route::put('/company/update', [SiteController::class, 'companyUpdate']);
    Route::get('/contacts', [SiteController::class, 'contacts']);
    Route::post('/contacts/update', [SiteController::class, 'contactsUpdate']);
    Route::get('/partners', [SiteController::class, 'partners']);
    Route::put('/partners/update', [SiteController::class, 'partnersUpdate']);
    Route::get('/feedbacks', [SiteController::class, 'feedbacks']);
    Route::post('/feedbacks/update', [SiteController::class, 'feedbacksUpdate']);
    Route::get('/questions', [SiteController::class, 'questions']);
    Route::post('/questions/update', [SiteController::class, 'questionsUpdate']);
});

