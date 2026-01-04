<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAbsensiTable extends Migration
{
    public function up()
    {
        // create field data type
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'karyawan_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true
            ],
            'check_in' => [
                'type' => 'DATETIME',
            ],
            'check_out' => [
                'type' => 'DATETIME',
                'null' => true
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
        //primary
        $this->forge->addKey('id', true);
        //foreign
        $this->forge->addForeignKey('karyawan_id', 'karyawan', 'id');
        //buat table
        $this->forge->createTable('absensi', true);
        
        /**
         * CREATE TABLE absensi (
         *      id BIGINT(20) PRIMARY AUTO INCREMENT,
         *      karyawan_id BIGINT(20),
         *      check_in DATETIME,
         *      check_out DATETIME NULL,
         *      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
         *      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
         *      FOREIGN KEY (karyawan_id) REFERENCES karyawan(id)
         * )
         */
    }

    public function down()
    {
        //drop table
        $this->forge->dropTable('absensi', true);
    }
}
