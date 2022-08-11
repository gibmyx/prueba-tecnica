<?php

declare(strict_types=1);

namespace App\Repositories\Shared;

interface RepositoryInterface
{
    public function all(): array;

    public function create(array  $data): void;

    public function update(array $data, string $id): void;

    public function delete(string $id): void;

    public function find(string $id);
}
