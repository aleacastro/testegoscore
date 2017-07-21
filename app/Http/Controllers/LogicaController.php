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

	/**
	/* Chico tem 1,50m e cresce 2 centímetros por ano, enquanto Juca tem 1,10m e cresce 3 centímetros por ano. Construir um algoritmos que calcule e imprima quantos anos serão necessários para que Juca seja maior que Chico
	*/
	public function idadeCalculo() {
		$chicoAltura = 150;
		$chicoCrescimento = 2;
		$jucaAltura = 110;
		$jucaCrescimento =3;

	    return view('idade', ['idade' => ceil(($chicoAltura-$jucaAltura)/($jucaCrescimento/$chicoCrescimento))]);

	}

	public function palavra() {
	    return view('palavra');

	}	

	public function fibonacci() {
	    return view('fibonacci');

	}		

}