<?php

declare(strict_types=1);

namespace App\Repositories\Purchases;

use App\Models\Purchase;

final class PurchasesRepository implements PurchasesRepositoryInterface
{
    protected $model;

    public function __construct(Purchase $post)
    {
        $this->model = $post;
    }

    public function all(): array
    {
        return $this->model->all()->toArray();
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

    public function find(string $id): ?Purchase
    {
        return $this->model->find($id);
    }
}
