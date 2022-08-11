<?php

declare(strict_types=1);

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Repositories\Invoices\InvoicesRepositoryInterface;
use App\Repositories\Purchases\PurchasesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

final class PurchasePostController extends Controller
{
    private $repository;
    private $invoicesRepository;

    public function __construct(
        PurchasesRepositoryInterface $repository,
        InvoicesRepositoryInterface $invoicesRepository
    )
    {
        $this->repository = $repository;
        $this->invoicesRepository = $invoicesRepository;
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

    public function generateInvoices()
    {
        $purchases = $this->repository->purchasesWithoutInvoices();
        collect($purchases)->groupBy("user_id")->each(function (Collection $purchases) {
            $code = $this->invoicesRepository->lastCode();

            $invoice = [
                'code' => $code,
                'user_id' => $purchases->first()['user_id'],
            ];

            $this->invoicesRepository->create($invoice);
            $result = $this->invoicesRepository->findWithcode($code);

            $purchases->each(function ($purchase) use ($result) {
                $this->repository->update(['invoice_id' =>  $result->id], (string) $purchase['id']);
            });
        });

        return response()->noContent(201);
    }
}
