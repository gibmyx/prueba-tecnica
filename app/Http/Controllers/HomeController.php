<?php

namespace App\Http\Controllers;

use App\Repositories\Products\ProductsRepositoryInterface;

class HomeController extends Controller
{
    private $repository;

    public function __construct(
        ProductsRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $products = $this->repository->all();
        return view('home', [
            'products' => $products
        ]);
    }
}
