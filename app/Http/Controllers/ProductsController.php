<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class ProductsController extends Controller
{
    private $repository;

    public function __construct(
        ProductsRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function index()
    {
        $products = $this->repository->all();
        return view('products', ['products' => $products]);
    }

    public function showProduct(string $id)
    {
        $product = $this->repository->find($id);
        return view('product-edit', ['product' => $product]);
    }

    public function createProduct()
    {
        return view('product-create');
    }

    public function update(Request $request)
    {
        $this->repository->update($request->all(), (string) $request->get("id"));
        return redirect(route("products.list"));
    }

    public function save(Request $request)
    {
        $this->repository->create($request->all());
        return redirect(route("products.list"));
    }
}
