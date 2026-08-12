<?php

namespace Database\Seeders;

use Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        try {
            $this->db->query("TRUNCATE TABLE users");
            $this->db->execute();
        } catch (\Throwable $e) {
            $this->db->query("DELETE FROM users");
            $this->db->execute();
        }

        $users = [
            [
                'name' => 'Razenry Admin',
                'email' => 'razenry@zen-php.com',
                'password' => password_hash('secret123', PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen Lead Developer',
                'email' => 'developer@zen-php.com',
                'password' => password_hash('secret123', PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($users as $user) {
            $this->db->query("INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, :created_at)");
            $this->db->bind(':name', $user['name']);
            $this->db->bind(':email', $user['email']);
            $this->db->bind(':password', $user['password']);
            $this->db->bind(':created_at', $user['created_at']);
            $this->db->execute();
        }
    }
}
