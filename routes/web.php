<?php

use App\Http\Controllers\ProposalController;
use App\Http\Resources\UserNotificationResource;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('coba/', 'PlaygroundController@playground');
Route::get('get_contract/', 'PlaygroundController@getRandomContract');
Route::get('coba_cache/', function () {
    // return Cache::get('users_all');
    return response()->json(Cache::remember(
        'users_all',
        60,
        function () {
            return User::all();
        }
    ));
});

// Data Controller
Route::get('data/kota', 'DataController@selectKota');
Route::get('data/job/{job_id}', 'DataController@getJob');

Route::get('/jobs', 'HomeController@jobs')->name('jobs');

// Auth::routes(['verify' => true]);
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

// Route::get('vue', function () {
//     return view('vuem');
// })->name('vuem');

// Route::group(['prefix' => 'message'], function () {
//     Route::get('user/{query}', 'MessageController@user');
//     Route::get('user-message/{id}', 'MessageController@message');
//     Route::get('user-message/{id}/read', 'MessageController@read');
//     Route::post('user-message', 'MessageController@send');
// });

Route::resources([
    'job' => 'JobController',
    'proposal' => 'ProposalController'
]);
Route::middleware('auth')->prefix('proposal')->name('proposal.')->group(base_path('routes/web_proposal.php'));

Route::prefix('')->name('root.')->group(base_path('routes/web_home.php'));

Route::prefix('dashboard')->name('dashboard.')->group(base_path('routes/web_dashboard.php'));

Route::prefix('admin')->name('admin.')->group(base_path('routes/web_admin.php'));

Route::prefix('payment')->name('payment.')->group(base_path('routes/web_payment.php'));

// Route::prefix('')->name('')->group(base_path('routes/web_job.php'));
