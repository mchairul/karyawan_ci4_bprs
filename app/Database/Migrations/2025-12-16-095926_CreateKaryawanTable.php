<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateKaryawanTable extends Migration
{
    public function up()
    {
        // fields
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'divisi_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'tanggal_lahir' => [
                'type' => 'DATE'
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

        //primary key
        $this->forge->addKey('id', true);
        //foreign key
        $this->forge->addForeignKey('divisi_id', 'divisi', 'id', 'CASCADE', 'RESTRICT');
        // create table
        $this->forge->createTable('karyawan', true);
    }

    public function down()
    {
        $this->forge->dropTable('karyawan', true);
    }
}
