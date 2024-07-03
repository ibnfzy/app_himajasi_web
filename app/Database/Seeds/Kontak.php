<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kontak extends Seeder
{
    public function run()
    {
        $this->db->table('kontak')->insert([
            'email' => 'dKqQp@example.com',
            'ig' => 'himajasi',
            'wa' => '6281234567890'
        ]);
    }
}
