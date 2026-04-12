<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function all(): Collection
    {
        // Implementasi logika untuk mendapatkan semua pengguna
        return User::orderBy('id', 'asc')->get();
    }
    public function findById(int $id): ?User
    {
        return User::find($id);
    }
    public function create(array $data): User
    {
        // Implementasi logika untuk membuat pengguna baru
        return User::create($data);
    }
    public function update(int $id, array $data): User
    {
        // Implementasi logika untuk memperbarui pengguna
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }
    public function delete(int $id): User
    {
        // Implementasi logika untuk menghapus pengguna
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}