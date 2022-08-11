<?php

declare(strict_types=1);

namespace App\Repositories\Invoices;

use App\Models\Invoice;
use Carbon\Carbon;

final class InvoicesRepository implements InvoicesRepositoryInterface
{
    protected $model;

    public function __construct(Invoice $post)
    {
        $this->model = $post;
    }

    public function all(): array
    {
        return $this->model
            ->with("user")
            ->with("purchase")
            ->get()
            ->toArray();
    }

    public function create(array $data): void
    {
        $this->model->create($data);
    }

    public function update(array $data, string $id): void
    {
        $this->model->find($id)->update($data);
    }

    public function delete(string $id): void
    {
        // TODO: Implement delete() method.
    }

    public function find(string $id)
    {
        return $this->model
            ->with("user")
            ->with("purchase")
            ->find($id);
    }

    public function findWithcode(string $code): ?Invoice
    {
        return $this->model->where("code", $code)->first();
    }

    public function lastCode(): string
    {
        $len_numero = 6;
        $inicia = '0';
        $year = Carbon::now()->format('y');
        $maxCode = $this->model::max('code');
        $result = empty($maxCode) ? 0 : (int)str_replace("FC" . $year, "", $maxCode);
        $codigo = str_pad((string) ($result +1), $len_numero, $inicia, STR_PAD_LEFT);
        return "FC{$year}{$codigo}";
    }
}
