<?php 
namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
//use App\Emprestimo; //loads the emprestimo model
use Illuminate\Http\Request; //loads the Request class for retrieving inputs
//use Illuminate\Support\Facades\Hash; //load this to use the Hash::make method
use Illuminate\Http\Response;

class EmprestimoController extends Controller
{


	public function store(Request $request){ //Insert new record to emprestimos table
	    $this->validate($request, [
	        'livro'  => 'required',
	        'tipo' => 'required',
	        'nome'  => 'required'
	    ]); 
	    response()->json(app('db')->insert("insert into emprestimos (nome, livro, tipo) values (?, ?, ?)",
	    [
	    	$request->input('nome'),
	    	$request->input('livro'),
	    	$request->input('tipo')
	    ]));
	}

	public function index(){ 
	    return response()->json(app('db')->select('select * from emprestimos'));
	    //return emprestimo::all();
	}

	public function show(Request $request, $id){ 
	    return response()->json(app('db')->select('select * from emprestimos where id = ?',
	    [
	    $id
	    ]));
	}

	public function update(Request $request, $id){ 
	    $this->validate($request, [
	        'email'  => 'required',
	        'password' => 'sometimes',
	        'name'  => 'required',
	        'address' => 'required',
	        'phone'  => 'required'
	    ]); 
	    $emprestimo    = emprestimo::find($id);
	    $emprestimo->email   = $request->input('email');
	    if($request->has('password')){
	        $emprestimo->password = Hash::make( $request->input('password') );
	    }
	    $emprestimo->name   = $request->input('name');
	    $emprestimo->address   = $request->input('address');
	    $emprestimo->phone   = $request->input('phone');
	    $emprestimo->save();
	}

	public function destroy(Request $request){
	    $this->validate($request, [
	        'id' => 'required'
	    ]);
	    response()->json(app('db')->delete("delete from emprestimos where id = ?",
	    [
	    $request->input('id')
	    ]));
	}
}