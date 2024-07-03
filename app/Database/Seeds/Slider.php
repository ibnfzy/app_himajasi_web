<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Slider extends Seeder
{
    public function run()
    {
        $this->db->table('slider')->insertBatch([
            [
                'image' => 'f.jpg',
            ], [
                'image' => '1719235840_372d58d7abdfb72c6ad9.png',
            ]
        ]);
    }
}
