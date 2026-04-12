<?php

use App\Repository\Contracts\UserRepositoryInterface;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAllUsers()
    {
        // Implementasi logika untuk mendapatkan semua pengguna
        return $this->userRepo->all();
    }

    public function storeUser(array $data)
    {
        // Implementasi logika untuk membuat pengguna baru
        return $this->userRepo->create($data);
    }

    public function showUser(int $id)
    {
        // Implementasi logika untuk menampilkan detail pengguna
        return $this->userRepo->findById($id);
    }

    public function updateUser(int $id, array $data)
    {
        // Implementasi logika untuk memperbarui pengguna
        return $this->userRepo->update($id, $data);
    }

    public function deleteUser(int $id)
    {
        // Implementasi logika untuk menghapus pengguna
        return $this->userRepo->delete($id);
    }
}