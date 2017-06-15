<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CupomRepository;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Http\Controllers\Controller;

class CupomsController extends Controller{

	private $repository;

	public function __construct(CupomRepository $repository){

		$this->repository = $repository;

	}
	public function index(){

		$titulo = "Listagem Cupons";
		$cupoms = $this->repository->paginate();

		return view('admin.cupoms.index', compact('cupoms', 'titulo'));
	}  

	public function create(){

		$titulo = "Novo Cupom";

		return view('admin.cupoms.create', compact('titulo'));
	}  

	public function store(AdminCupomRequest $request){
		
		$data = $request->all();
		$this->repository->create($data);

		return redirect()->route('admin.cupoms.index');
	}  

	public function edit($id){

		$titulo = "Editando Categoria";
		$category = $this->repository->find($id);

		return view('admin.categories.edit', compact('category', 'titulo'));
	}

	public function update(AdminCategoryRequest $request, $id){

		$data = $request->all();
		$this->repository->update($data, $id);

		return redirect()->route('admin.categories.index');		

	}

}
