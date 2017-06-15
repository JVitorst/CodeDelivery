<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Controllers\Controller;

class CategoriesController extends Controller{

	private $repository;

	public function __construct(CategoryRepository $repository){

		$this->repository = $repository;

	}
	public function index(){

		$titulo = "Listagem Categorias";
		$categories = $this->repository->paginate();

		return view('admin.categories.index', compact('categories', 'titulo'));
	}  

	public function create(){

		$titulo = "Nova Categoria";

		return view('admin.categories.create', compact('titulo'));
	}  

	public function store(AdminCategoryRequest $request){
		
		$data = $request->all();
		$this->repository->create($data);

		return redirect()->route('admin.categories.index');
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
