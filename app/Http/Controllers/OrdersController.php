<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{
    
    private $repository;

    public function __construct(OrderRepository $repository){
        
        $this->repository = $repository;

    }


    public function index(){
        
        $titulo = "Listagem Pedidos";
        $orders = $this->repository->paginate();

        return view('admin.orders.index', compact('orders','titulo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, UserRepository $userRepository)
    {
        $titulo = "Listagem Pedido";
        
        $list_status = [
        0 => 'Pendente', 
        1 => 'A caminho', 
        2 => 'Entregue',
        3 => 'Cancelado'
        ];

        $order = $this->repository->find($id);
        $deliveryman = $userRepository->getDeliverymen();


        return view('admin.orders.edit', compact('order', 'titulo', 'list_status', 'deliveryman'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $all = $request->all();
        $this->repository->update($all, $id);

        return redirect()->route('admin.orders.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
