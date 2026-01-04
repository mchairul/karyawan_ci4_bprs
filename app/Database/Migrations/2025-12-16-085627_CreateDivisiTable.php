<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateDivisiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_divisi' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);
        // set primary key
        $this->forge->addKey('id', true);
        // create table
        $this->forge->createTable('divisi', true);
    }

    public function down()
    {
        // DROP TABLE absensi
        //$this->forge->dropTable('divisi');

        // DROP TABLE IF NOT EXISTS divisi
        $this->forge->dropTable('divisi', true);
    }
}
