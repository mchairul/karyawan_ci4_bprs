<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDivisi;
use CodeIgniter\HTTP\ResponseInterface;

class DivisiController extends BaseController
{
    protected $validation;

    /**
     * construct validation
     */
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    /**
     * menampilkan list divisi
     */
    public function listDivisi()
    {
        // inisiasi model
        $divisiModel = new ModelDivisi();

        // alias SELECT * FROM divisi
        $data = $divisiModel->get();

        //var_dump($data);exit;

        return view('divisi/view_list_divisi', [
            'dataDivisi' => $data
        ]);
    }

    /**
     * form tambah divisi
     */
    public function formTambahDivisi()
    {
        return view('divisi/view_tambah_divisi', [
            'validation' => $this->validation
        ]);
    }

    /**
     * proses tambah divisi
     */
    public function postTambahDivisi()
    {
        $namaDivisi = $this->request->getPost('nama_divisi');

        $rules = [
            'nama_divisi' => 'required|is_unique[divisi.nama_divisi]|min_length[3]',
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (! $this->validateData($data, $rules)) {
            return view('divisi/view_tambah_divisi', [
                'validation' => $this->validation
            ]);
        }

        $modelDivisi = new ModelDivisi();

        $data = [
            'nama_divisi' => $namaDivisi
        ];

        if ($modelDivisi->insert($data)) {
            session()->setFlashdata('pesan_sukses', 'Tambah Divisi Berhasil');
        }

        return redirect()->to(url_to('divisi.list'));
    }

    /**
     * form edit divisi
     */
    public function formEditDivisi($id)
    {
        $modelDivisi = new ModelDivisi();

        // select * from divisi where id = $id
        // $modelDivisi->where('id', $id);
        $divisi = $modelDivisi->find($id);

        //dd($divisi);

        return view('divisi/view_edit_divisi', [
            'divisi' => $divisi,
            'validation' => $this->validation
        ]);
    }

    /**
     * proses edit divisi
     */
    public function postEditDivisi()
    {
        $id = $this->request->getPost('id');
        $namaDivisi = $this->request->getPost('nama_divisi');

        $rules = [
            'id' => 'required',
            'nama_divisi' => 'required|is_unique[divisi.nama_divisi,id,{id}]|min_length[3]',
        ];

        $data = $this->request->getPost(array_keys($rules));

        $modelDivisi = new ModelDivisi();

        if (! $this->validateData($data, $rules)) {
            $divisi = $modelDivisi->find($id);
            return view('divisi/view_edit_divisi', [
                'divisi' => $divisi,
                'validation' => $this->validation
            ]);
        }

        /**
         * UPDATE divisi SET nama_divisi = '$namaDivisi'
         * WHERE id = $id
         */
        $modelDivisi->set('nama_divisi', $namaDivisi);
        $modelDivisi->where('id', $id);
        if ($modelDivisi->update()) {
            session()->setFlashdata('pesan_sukses', 'Edit Divisi Berhasil');
        }

        return redirect()->to(url_to('divisi.list'));
    }

    /**
     * proses delete divisi
     */
    public function deleteDivisi()
    {
        $id = $this->request->getGet('id');

        $modelDivisi = new ModelDivisi();

        if ($modelDivisi->delete($id)) {
            session()->setFlashdata('pesan_sukses', 'Delete Divisi Berhasil');
        }

        return redirect()->to(url_to('divisi.list'));
    }
}
