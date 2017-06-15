<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ProductRepository;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class CheckoutController extends Controller{

	private $repository;
	private $userRepository;
	private $productRepository;

	public function __construct(OrderRepository $repository, UserRepository $userRepository,
								ProductRepository $productRepository){

		$this->repository = $repository;
		$this->UserRepository = $userRepository;
		$this->productRepository = $productRepository;

	}

	public function create(){

		$products = $this->productRepository->lists();
		return view('customer.order.create', compact('products'));
	}
	

}
