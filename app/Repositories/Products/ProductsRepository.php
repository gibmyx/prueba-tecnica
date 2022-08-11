<?php

declare(strict_types=1);

namespace App\Repositories\Products;

use App\Models\Product;

final class ProductsRepository implements ProductsRepositoryInterface
{
    protected $model;

    public function __construct(Product $post)
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

    public function find(string $id): ?Product
    {
        return $this->model->find($id);
    }
}
