<?php

namespace Database\Seeders;

use Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        try {
            $this->db->query("TRUNCATE TABLE products");
            $this->db->execute();
        } catch (\Throwable $e) {
            $this->db->query("DELETE FROM products");
            $this->db->execute();
        }

        $products = [
            [
                'name' => 'Zen Cloud Enterprise Server',
                'price' => 1250000,
                'description' => 'Server cloud performa tinggi dengan akselerasi Zen PHP Core Engine dan autoscaling instant.',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen Pulse Pro License',
                'price' => 450000,
                'description' => 'Lisensi toolkit komponen reaktif zero-dependency untuk pembuatan UI real-time tanpa Node.js.',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen API Gateway Suite',
                'price' => 890000,
                'description' => 'Suite arsitektur RESTful API enterprise dengan Validator otomatis, ApiResource DTO, dan JWT bearer auth.',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen Service-Repo Boilerplate',
                'price' => 299000,
                'description' => 'Template arsitektur proyek enterprise terstruktur berbasis Service & Repository Pattern.',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen Pest Testing Kit',
                'price' => 199000,
                'description' => 'Paket otomatisasi unit & feature testing Pest PHP dengan eksekusi ultra-cepat 0.21 detik.',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zen CLI Developer Tools',
                'price' => 150000,
                'description' => 'Perkakas baris perintah (CLI) untuk scaffolding controller, service, repository, dan seeder.',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($products as $p) {
            $this->db->query("INSERT INTO products (name, price, description, created_at) VALUES (:name, :price, :description, :created_at)");
            $this->db->bind(':name', $p['name']);
            $this->db->bind(':price', $p['price']);
            $this->db->bind(':description', $p['description']);
            $this->db->bind(':created_at', $p['created_at']);
            $this->db->execute();
        }
    }
}
