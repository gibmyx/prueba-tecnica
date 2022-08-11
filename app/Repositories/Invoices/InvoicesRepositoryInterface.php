<?php

declare(strict_types=1);

namespace App\Repositories\Invoices;

use App\Models\Invoice;
use App\Repositories\Shared\RepositoryInterface;

interface InvoicesRepositoryInterface extends RepositoryInterface
{
    public function lastCode(): string;

    public function findWithcode(string $code): ?Invoice;
}
