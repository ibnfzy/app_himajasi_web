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
        return view('panel/kegiatan', [
            'data' => $this->db->table('kegiatan')->get()->getResultArray()
        ]);
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

    public function upload_image()
    {
        $validationRule = [
            'file' => [
                'label' => 'Image File',
                'rules' => 'uploaded[file]|is_image[file]|max_size[file,1024]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['uploaded' => false, 'error' => $this->validator->getErrors()]);
        }

        $img = $this->request->getFile('file');
        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move('uploads/image_manager', $newName);

            $imageUrl = base_url('uploads/image_manager/' . $newName);
            return $this->response->setJSON(['uploaded' => true, 'link' => $imageUrl]);
        }

        return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
            ->setJSON(['uploaded' => false, 'error' => 'The file has already been moved.']);
    }

    public function deleteImage()
    {
        $src = (string) $this->request->getPost('src');
        $filePath = WRITEPATH . 'uploads/image_manager/' . basename($src);

        if (is_file($filePath)) {
            if (unlink($filePath)) {
                return $this->response->setJSON(['deleted' => true]);
            }
        }

        return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
            ->setJSON(['deleted' => false, 'error' => 'Unable to delete the image.']);
    }

    public function about_insert()
    {
        $rules = [
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten harus diisi'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('Panel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('informasi')->insert([
            'body' => $this->request->getPost('body'),
            'type' => 'about',
        ]);

        return redirect()->to(base_url('Panel'))->with('type-status', 'success')->with('dataMessage', 'Data informasi tentang HIMAJASI berhasil ditambahkan');
    }

    public function sejarah_insert()
    {
        $rules = [
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten harus diisi'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('Panel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('informasi')->insert([
            'body' => $this->request->getPost('body'),
            'type' => 'sejarah',
        ]);

        return redirect()->to(base_url('Panel'))->with('type-status', 'success')->with('dataMessage', 'Data informasi sejarah HIMAJASI berhasil ditambahkan');
    }

    public function struktur_insert()
    {
        $rules = [
            'image' => [
                'rules' => 'uploaded[image]|is_image[image]|max_size[image,3024]',
                'errors' => [
                    'uploaded' => 'File harus diunggah',
                    'is_image' => 'File harus berupa gambar',
                    'max_size' => 'Ukuran file terlalu besar'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('Panel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $img = $this->request->getFile('image');
        $newName = $img->getRandomName();
        $img->move('uploads/image_manager', $newName);

        $this->db->table('informasi')->insert([
            'image' => $newName,
            'type' => 'struktur',
        ]);
    }
}
