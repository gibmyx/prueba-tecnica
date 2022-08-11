<?php

declare(strict_types=1);

namespace App\Http\Controllers\Invoices;

use App\Repositories\Invoices\InvoicesRepositoryInterface;

final class InvoicesController
{
    private $repository;

    public function __construct(
        InvoicesRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $invoices = $this->repository->all();
        return view('invoices', ['invoices' => $invoices]);
    }
}
