<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exporter;
use Importer;
use Illuminate\Support\Facades\Input;
use App\Model\Contact;
use Queue;

class ExcelController extends Controller
{
    //
    public function upload(){
    	return view('upload');
    }

    public function ImportClients(){
    	$file = Input::file('file');
    	$file_name = $file->getClientOriginalName();

    	$excel = Importer::make('Excel');
		$excel->load($file);
		$collection = $excel->getCollection();
		/*foreach ($collection as $key => $value) {
			// echo $value[0]."<br>";
			Contact::create([
				'number' => $value[0],
			]);
		}*/
		Queue::looping(function () {
		    foreach ($collection as $key => $value) {
				Contact::create([
					'number' => $value[0],
				]);
			}
		});
		echo "success";



    }
}
