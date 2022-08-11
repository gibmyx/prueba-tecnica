<?php

declare(strict_types=1);

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Repositories\Purchases\PurchasesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class PurchasePostController extends Controller
{
    private $repository;

    public function __construct(
        PurchasesRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): Response
    {
        $this->repository->create([
            'user_id' => Auth::id(),
            'product_id' =>  $request->get("product_id" ),
            'cantidad' => $request->get("cantidad", 0)
        ]);
        return response()->noContent(201);
    }
}
