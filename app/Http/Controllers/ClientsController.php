<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller{

	private $repository;
	private $clientService;

	public function __construct(ClientRepository $repository, ClientService $clientService){

		$this->repository = $repository;
		$this->clientService = $clientService;

	}
	public function index(){

		$titulo = "Listagem Clientes";
		$clients = $this->repository->paginate();

		return view('admin.clients.index', compact('clients', 'titulo'));
	}  

	public function create(){

		$titulo = "Novo Cliente";

		return view('admin.clients.create', compact('titulo'));
	}  

	public function store(AdminClientRequest $request){
		
		$data = $request->all();
		$this->clientService->create($data);

		return redirect()->route('admin.clients.index');
	}  

	public function edit($id){

		$titulo = "Editando Cliente";
		$client = $this->repository->find($id);

		return view('admin.clients.edit', compact('client', 'titulo'));
	}

	public function update(AdminClientRequest $request, $id){

		$data = $request->all();
		$this->clientService->update($data, $id);

		return redirect()->route('admin.clients.index');		

	}

}
