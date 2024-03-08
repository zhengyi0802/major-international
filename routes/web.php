<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCatagoryController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductStatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRecordController;
use App\Http\Controllers\ProductQueryController;
use App\Http\Controllers\LogMessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\MainVideoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StartpageController;
use App\Http\Controllers\FrontendViewController;
use App\Http\Controllers\AppMenuController;
use App\Http\Controllers\AppAdvertisingController;
use App\Http\Controllers\VoiceSettingController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\BulletinItemController;
use App\Http\Controllers\MarqueeController;
use App\Http\Controllers\ApkManagerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\QACatagoryController;
use App\Http\Controllers\QAListController;
use App\Http\Controllers\CustomerSupportController;
use App\Http\Controllers\ELearningCatagoryController;
use App\Http\Controllers\ELearningController;
use App\Http\Controllers\MediaCatagoryController;
use App\Http\Controllers\MediaContentController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoCatagoryController;
use App\Http\Controllers\FileSystemController;
use App\Http\Controllers\OneKeyInstallerController;
use App\Http\Controllers\AppManagerController;
use App\Http\Controllers\HotAppController;
use App\Http\Controllers\ApiTestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/admin/settings', function() {
    return view('admin.settings');
})->name('settings');

Route::get('/admin/profile', function() {
    return view('admin.profile');
})->name('profile');

Route::get('admin/change_password', [App\Http\Controllers\ChangePasswordController::class, 'index']);

Route::post('admin/change_password', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('change.password');

Route::resource('/product_catagories', ProductCatagoryController::class);

Route::resource('/product_types', ProductTypeController::class);

Route::resource('/product_statuses', ProductStatusController::class);

Route::resource('/product_queries', ProductQueryController::class);

Route::get('/products/query', [App\Http\Controllers\ProductController::class, 'query'])
       ->name('products.query');

Route::get('/products/register', [App\Http\Controllers\ProductController::class, 'register'])
       ->name('products.register');

Route::resource('/products', ProductController::class);

Route::resource('/product_records', ProductRecordController::class);

Route::get('/logmessages/browse/{mac}', [App\Http\Controllers\LogMessageController::class, 'browse'])
       ->name('logmessages.browse');

Route::post('/logmessages/savelog', [App\Http\Controllers\LogMessageController::class, 'savelog'])
       ->name('logmessages.savelog');

Route::resource('/logmessages', LogMessageController::class);

Route::resource('/projects', ProjectController::class);

Route::get('/logos/{project}/edit2', [App\Http\Controllers\LogoController::class, 'edit2'])
       ->name('logos.edit2');

Route::get('/logos/{project}/create2', [App\Http\Controllers\LogoController::class, 'create2'])
       ->name('logos.create2');

Route::get('/logos/{project}/query', [App\Http\Controllers\LogoController::class, 'query'])
       ->name('logos.query');

Route::get('/logos/browse', [App\Http\Controllers\LogoController::class, 'browse'])
       ->name('logos.browse');

Route::post('/logos/{project}/{logo}/store2', [App\Http\Controllers\LogoController::class, 'store2'])
       ->name('logos.store2');

Route::resource('/logos', LogoController::class);

Route::get('/startpages/query', [App\Http\Controllers\StartpageController::class, 'query'])
       ->name('startpages.query');

Route::get('/startpages/browse', [App\Http\Controllers\StartpageController::class, 'browse'])
       ->name('startpages.browse');

Route::resource('/startpages', StartpageController::class);

Route::get('/frontend_views', [App\Http\Controllers\FrontendViewController::class, 'index'])
       ->name('frontend_views.index');

Route::get('/frontend_views/query', [App\Http\Controllers\FrontendViewController::class, 'query'])
       ->name('frontend_views.query');

Route::get('/frontend_views/{project}/edit', [App\Http\Controllers\FrontendViewController::class, 'edit'])
       ->name('frontend_views.edit');

Route::get('/businesses/{project}/create2', [App\Http\Controllers\BusinessController::class, 'create2'])
       ->name('businesses.create2');

Route::get('/businesses/{project}/edit2', [App\Http\Controllers\BusinessController::class, 'edit2'])
       ->name('businesses.edit2');

Route::get('/businesses/query', [App\Http\Controllers\BusinessController::class, 'query'])
       ->name('businesses.query');

Route::post('/businesses/{project}/{business}/store2', [App\Http\Controllers\BusinessController::class, 'store2'])
       ->name('businesses.store2');

Route::get('/businesses/browse', [App\Http\Controllers\BusinessController::class, 'browse'])
       ->name('businesses.browse');

Route::resource('/businesses', BusinessController::class);

Route::get('/advertisings/{project}/create2', [App\Http\Controllers\AdvertisingController::class, 'create2'])
       ->name('advertisings.create2');

Route::get('/advertisings/{project}/edit2', [App\Http\Controllers\AdvertisingController::class, 'edit2'])
       ->name('advertisings.edit2');

Route::get('/advertisings/query', [App\Http\Controllers\AdvertisingController::class, 'query'])
       ->name('advertisings.query');

Route::post('/advertisings/{project}/{advertising}/store2', [App\Http\Controllers\AdvertisingController::class, 'store2'])
       ->name('advertisings.store2');

Route::resource('/advertisings', AdvertisingController::class);

Route::get('/appadvertisings/query', [App\Http\Controllers\AppAdvertisingController::class, 'query'])
       ->name('appadvertisings.query');

Route::get('/appadvertisings/store2', [App\Http\Controllers\AppAdvertisingController::class, 'store2'])
       ->name('appadvertisings.store2');

Route::resource('/appadvertisings', AppAdvertisingController::class);

Route::get('/mainvideos/{project}/create2', [App\Http\Controllers\MainVideoController::class, 'create2'])
       ->name('mainvideos.create2');

Route::get('/mainvideos/{project}/edit2', [App\Http\Controllers\MainVideoController::class, 'edit2'])
       ->name('mainvideos.edit2');

Route::get('/mainvideos/query', [App\Http\Controllers\MainVideoController::class, 'query'])
       ->name('mainvideos.query');

Route::post('/mainvideos/{project}/{mainvideo}/store2', [App\Http\Controllers\MainVideoController::class, 'store2'])
       ->name('mainvideos.store2');

Route::resource('/mainvideos', MainVideoController::class);

Route::get('/appmenus/{project}/{position}/create2', [App\Http\Controllers\AppMenuController::class, 'create2'])
       ->name('appmenus.create2');

Route::get('/appmenus/{project}/{position}/edit2', [App\Http\Controllers\AppMenuController::class, 'edit2'])
       ->name('appmenus.edit2');

Route::post('/appmenus/{project}/{position}/{appmenu}/update2', [App\Http\Controllers\AppMenuController::class, 'update2'])
       ->name('appmenus.update2');

Route::post('/appmenus/{project}/{position}/store2', [App\Http\Controllers\AppMenuController::class, 'store2'])
       ->name('appmenus.store2');

Route::get('/appmenus/query', [App\Http\Controllers\AppMenuController::class, 'query'])
       ->name('appmenus.query');

Route::resource('/appmenus', AppMenuController::class);

Route::get('/menus/query', [App\Http\Controllers\MenuController::class, 'query'])
       ->name('menus.query');

Route::resource('/menus', MenuController::class);

Route::get('/bulletins/{projec}/create2', [App\Http\Controllers\BulletinController::class, 'create2'])
       ->name('bulletins.create2');

Route::get('/bulletins/{project}/edit2', [App\Http\Controllers\BulletinController::class, 'edit2'])
       ->name('bulletins.edit2');

Route::post('/bulletins/{project}/{bulletin}/store2', [App\Http\Controllers\BulletinController::class, 'store2'])
       ->name('bulletins.store2');

Route::get('/bulletins/query', [App\Http\Controllers\BulletinController::class, 'query'])
       ->name('bulletins.query');

Route::get('/bulletins/project', [App\Http\Controllers\BulletinController::class, 'project'])
       ->name('bulletins.project');

Route::resource('/bulletins', BulletinController::class);

Route::get('/bulletinitems/{bulletin}/index2', [App\Http\Controllers\BulletinItemController::class, 'index2'])
       ->name('bulletinitems.index2');

Route::get('/bulletinitems/{bulletin}/create2', [App\Http\Controllers\BulletinItemController::class, 'create2'])
       ->name('bulletinitems.create2');

Route::get('/bulletinitems/{bulletin}/{bulletinitem}/edit2', [App\Http\Controllers\BulletinItemController::class, 'edit2'])
       ->name('bulletinitems.edit2');

Route::get('/bulletinitems/{bulletin}/{bulletinitem}/show2', [App\Http\Controllers\BulletinItemController::class, 'show2'])
       ->name('bulletinitems.show2');

Route::post('/bulletinitems/{bulletin}/store2', [App\Http\Controllers\BulletinItemController::class, 'store2'])
       ->name('bulletinitems.store2');

Route::post('/bulletinitems/{bulletin}/{bulletinitem}/update2', [App\Http\Controllers\BulletinItemController::class, 'update2'])
       ->name('bulletinitems.update2');

Route::resource('/bulletinitems', BulletinItemController::class);

Route::get('/marquees/query', [App\Http\Controllers\MarqueeController::class, 'query'])
       ->name('marquees.query');

Route::resource('/marquees', MarqueeController::class);

Route::get('/qacatagories/query', [App\Http\Controllers\QACatagoryController::class, 'query'])
       ->name('qacatagories.query');

Route::resource('/qacatagories', QACatagoryController::class);

Route::get('/qalists/query', [App\Http\Controllers\QAListController::class, 'query'])
       ->name('qalists.query');

Route::get('/qalists/queryall', [App\Http\Controllers\QAListController::class, 'queryall'])
       ->name('qalists.queryall');

Route::resource('/qalists', QAListController::class);

Route::get('/voicesettings/query', [App\Http\Controllers\VoiceSettingController::class, 'query'])
       ->name('voicesettings.query');

Route::resource('/voicesettings', VoiceSettingController::class);

Route::get('/customersupports/query', [App\Http\Controllers\CustomerSupportController::class, 'query'])
       ->name('customersupports.query');

Route::resource('customersupports', CustomerSupportController::class);

Route::get('/elearningcatagories/query', [App\Http\Controllers\ELearningCatagoryController::class, 'query'])
       ->name('elearningcatagories.query');

Route::post('/elearningcatagories/copy', [App\Http\Controllers\ELearningCatagoryController::class, 'copy'])
       ->name('elearningcatagories.copy');

Route::resource('/elearningcatagories', ELearningCatagoryController::class);

Route::get('elearnings/query', [App\Http\Controllers\ELearningController::class, 'query'])
       ->name('elearnings.query');

Route::resource('/elearnings', ELearningController::class);

//Route::get('/packages/query', [App\Http\Controllers\PackageController::class, 'query'])
//       ->name('packages.query');

Route::get('/apkmanagers/query', [App\Http\Controllers\ApkManagerController::class, 'query'])
       ->name('apkmanagers.query');

Route::resource('/apkmanagers', ApkManagerController::class);

Route::resource('/managers', ManagerController::class);

//Route::get('/apiinterface/register', [App\Http\Controllers\ApiInterfaceController::class, 'register'])
//       ->name('apiinterface.register');

Route::get('/api/queryRechargeData', [App\Http\Controllers\ApiInterfaceController::class, 'queryRechargeData'])
       ->name('apiinterface.queryRechargeData');

Route::get('/api/productRegister', [App\Http\Controllers\ApiInterfaceController::class, 'productRegister'])
       ->name('apiinterface.productRegister');

Route::get('/api/queryProductType', [App\Http\Controllers\ApiInterfaceController::class, 'queryProductType'])
       ->name('apiinterface.queryProductType');

Route::get('/api/queryProductCatagory', [App\Http\Controllers\ApiInterfaceController::class, 'queryProductCatagory'])
       ->name('apiinterface.queryProductCatagory');

Route::get('/api/queryProductStatus', [App\Http\Controllers\ApiInterfaceController::class, 'queryProductStatus'])
       ->name('apiinterface.queryProductStatus');

Route::get('/api/queryProject', [App\Http\Controllers\ApiInterfaceController::class, 'queryProject'])
       ->name('apiinterface.queryProject');

Route::get('/api/selectProject', [App\Http\Controllers\ApiInterfaceController::class, 'selectProject'])
       ->name('apiinterface.selectProject');

Route::get('/api/checkdate', [App\Http\Controllers\ApiInterfaceController::class, 'checkdate'])
       ->name('apiinterface.checkdate');

Route::get('/api/saveProductType', [App\Http\Controllers\ApiInterfaceController::class, 'saveProductType'])
       ->name('apiinterface.saveProductType');

Route::get('/api/saveProductStatus', [App\Http\Controllers\ApiInterfaceController::class, 'saveProductStatus'])
       ->name('apiinterface.saveProductStatus');

Route::get('/api/saveProductCatagory', [App\Http\Controllers\ApiInterfaceController::class, 'saveProductCatagory'])
       ->name('apiinterface.saveProductCatagory');

Route::get('/api/timestamp', [App\Http\Controllers\ApiInterfaceController::class, 'timestamp'])
       ->name('apiinterface.timestamp');

Route::resource('/videocatagories', VideoCatagoryController::class);

Route::resource('/videos', VideoController::class);

Route::resource('/filesystem', FileSystemController::class);

Route::get('/onekeyinstallers/query', [App\Http\Controllers\OneKeyInstallerController::class, 'query'])
       ->name('onekeyinstallers.query');

Route::resource('/onekeyinstallers', OneKeyInstallerController::class);

Route::get('/appmanagers/query', [App\Http\Controllers\AppManagerController::class, 'query'])
       ->name('appmanagers.query');

Route::resource('/appmanagers', AppManagerController::class);

Route::get('youtube/home', [App\Http\Controllers\YoutubeController::class, 'home'])
       ->name('youtube.home');

Route::post('youtube/commit', [App\Http\Controllers\YoutubeController::class, 'commit'])
       ->name('youtube.commit');

Route::get('youtube/search', [App\Http\Controllers\YoutubeController::class, 'search'])
       ->name('youtube.search');

Route::get('/mediacatagories/query', [App\Http\Controllers\MediaCatagoryController::class, 'query'])
       ->name('mediacatagories.query');

Route::post('/mediacatagories/copy', [App\Http\Controllers\MediaCatagoryController::class, 'copy'])
       ->name('mediacatagories.copy');

Route::resource('/mediacatagories', MediaCatagoryController::class);

Route::get('mediacontents/query', [App\Http\Controllers\MediaContentController::class, 'query'])
       ->name('mediacontents.query');

Route::resource('/mediacontents', MediaContentController::class);

Route::get('/hotapps/query', [App\Http\Controllers\HotAppController::class, 'query'])
       ->name('hotapps.query');

Route::resource('/hotapps', HotAppController::class);

Route::get('/apitests/query', [App\Http\Controllers\ApiTestController::class, 'query'])
       ->name('apitests.query');

Route::resource('/apitests', ApiTestController::class);

Route::resource('/registers', RegisterController::class);

Route::resource('/warranties', WarrantyController::class);

Route::resource('/orders', OrderController::class);

Route::get('/lang/{lang}', function($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);

    return redirect()->back();
});

