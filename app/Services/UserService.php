<?php

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        // Implementasi logika untuk mendapatkan semua pengguna
        return $this->userRepo->all();
    }

    public function store(array $data)
    {
        // Implementasi logika untuk membuat pengguna baru
        return $this->userRepo->create($data);
    }

    public function show(string $id)
    {
        // Implementasi logika untuk menampilkan detail pengguna
        return $this->userRepo->findById($id);
    }

    public function update(string $id, array $data)
    {
        // Implementasi logika untuk memperbarui pengguna
        return $this->userRepo->update($id, $data);
    }

    public function delete(string $id)
    {
        // Implementasi logika untuk menghapus pengguna
        return $this->userRepo->delete($id);
    }
}