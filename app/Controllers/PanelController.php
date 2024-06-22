<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PanelController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        return view('panel/kegiatan');
    }

    public function kegiatan_insert()
    {
        $rules = [
            'judul' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'max_length' => 'Judul terlalu panjang, maksimal 255 karakter'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Body harus diisi'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('Panel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('kegiatan')->insert([
            'judul' => $this->request->getPost('judul'),
            'body' => $this->request->getPost('body'),
        ]);

        return redirect()->to(base_url('Panel'))->with('type-status', 'success')->with('dataMessage', 'Data kegiatan berhasil ditambahkan');
    }

    public function kegiatan_delete($id)
    {
        $this->db->table('kegiatan')->where('id', $id)->delete();
        return redirect()->to(base_url('Panel'))->with('type-status', 'success')->with('dataMessage', 'Data kegiatan berhasil dihapus');
    }

    public function kegiatan_update()
    {
        $rules = [
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID harus diisi'
                ]
            ],
            'judul' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'max_length' => 'Judul terlalu panjang, maksimal 255 karakter'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Body harus diisi'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('Panel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('kegiatan')->where('id', $this->request->getPost('id'))->update([
            'judul' => $this->request->getPost('judul'),
            'body' => $this->request->getPost('body'),
        ]);

        return redirect()->to(base_url('Panel'))->with('type-status', 'success')->with('dataMessage', 'Data kegiatan berhasil diupdate');
    }
}
