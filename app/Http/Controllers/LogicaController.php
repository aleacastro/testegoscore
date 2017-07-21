<?php 
namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
//use App\Emprestimo; //loads the emprestimo model
use Illuminate\Http\Request; //loads the Request class for retrieving inputs
//use Illuminate\Support\Facades\Hash; //load this to use the Hash::make method
use Illuminate\Http\Response;

class LogicaController extends Controller
{

	private function parOuImpar($array) {
		$arrayPI = array();

		foreach ($array as $key => $value) {
		    if ($value % 2 == 0)
		        $arrayPI['par'][] = $value;
		    else
		        $arrayPI['impar'][] = $value;
		}
		return $arrayPI;
	}

	public function matrizParImpar() {
		$matriz = array ();
		$arrayParImpar = array();

		for($j=0; $j<5; $j++){
			for($i=0; $i<5; $i++){
		        	$matriz[$j][$i]=rand(1,2000);
	    	}
	    }

	    foreach ($matriz as $key => $matriz2) {

    		$arrayResult = $this->parOuImpar($matriz2);
    		$arrayParImpar = array_merge_recursive($arrayParImpar, $arrayResult);
	    }

	    $arrayParImpar['matriz'] = $matriz;

	    return view('matriz', ['arrayParImpar' => $arrayParImpar]);

	}

}