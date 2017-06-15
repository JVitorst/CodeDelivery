<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Http\Controllers\Controller;

class ProductsController extends Controller{

	private $repository;
	private $categoryRepository;

	public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository){

		$this->repository = $repository;
		$this->categoryRepository = $categoryRepository	;

	}
	public function index(){

		$titulo = "Listagem Produtos";
		$products = $this->repository->paginate();

		return view('admin.products.index', compact('products', 'titulo'));
	}  

	public function create(){

		$categories = $this->categoryRepository->lists($columns = null, $key =null);
		$titulo = "Novo Produto";
		return view('admin.products.create', compact('titulo', 'categories'));
	}  

	public function store(AdminProductRequest $request){
		
		$data = $request->all();
		$this->repository->create($data);

		return redirect()->route('admin.products.index');
	}  

	public function edit($id){

		$titulo = "Editando Produto";
		$product = $this->repository->find($id);
		$categories = $this->categoryRepository->lists($columns = null, $key =null);

		return view('admin.products.edit', compact('product', 'titulo', 'categories'));
	}

	public function update(AdminProductRequest $request, $id){

		$data = $request->all();
		$this->repository->update($data, $id);

		return redirect()->route('admin.products.index');		

	}

  public function destroy($id){

    $this->repository->delete($id);
    return redirect()->route('admin.products.index');   

  }

}
