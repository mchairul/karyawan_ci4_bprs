<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DivisiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_divisi' => 'Marketing'
        ];

        $this->db->query('INSERT INTO divisi (nama_divisi) VALUES (:nama_divisi:)', $data);
    }
}
