<?php
use Maatwebsite\Excel\Excel;
use App\Jobs\SendEmailJob;
// use Carbon;
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
    return view('welcome');
});

Route::get('upload', 'ExcelController@upload')->name('upload_file');

Route::post('ImportClients', 'ExcelController@ImportClients');

Route::get('sendMail', function(){

	// SendEmailJob::dispatch();
	$job = (new SendEmailJob())
                ->delay(Carbon\Carbon::now()->addSeconds(10));

    dispatch($job);

    
	echo "string";

})->name('sendMail');