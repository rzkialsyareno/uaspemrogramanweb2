<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    // Category
    public function category()
    {
        $categoryModel = model('CategoryModel');
        $data['category'] = $categoryModel->findAll();
        return view('admin/category', $data);
    }

    public function create_category()
    {
        $categoryModel = model('CategoryModel');
        $data = $this->request->getPost();

        if ($categoryModel->insert($data, false)) {
            return redirect()->to('admin/category')->with('success', 'Data Berhasil Disimpan!');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Disimpan!');
        }
    }

    public function edit_category($id)
    {
        $categoryModel = model('CategoryModel');
        $data['category'] = $categoryModel->find($id);

        if (!$data['category']) {
            return redirect()->to('admin/category')->with('error', 'Kategori tidak ditemukan.');
        }
        return view('admin/edit-category', $data);
    }

    public function update_category($id)
    {
        $categoryModel = model('CategoryModel');
        $validation = $this->validate(['nama_kategori' => 'required|min_length[3]|max_length[100]',]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];
        if ($categoryModel->update($id, $data)) {
            return redirect()->to('admin/category')->with('success', 'Kategori Berhasil Diupdate!');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }

    public function delete_category($id)
    {
        $categoryModel = model('CategoryModel');
        if ($categoryModel->delete($id)) {
            return redirect()->to('admin/category')->with('success', 'Data Berhasil Dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }

    // Product
    public function product()
    {
        $produkModel = model('ProductModel');
        $kategoriModel = model('CategoryModel');
        $produk = $produkModel->select('produk.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = produk.id_kategori', 'left')
            ->findAll();
        $kategori = $kategoriModel->findAll();

        $data = [
            'product' => $produk,
            'kategori' => $kategori
        ];
        return view('admin/product', $data);
    }

    public function create_product()
    {
        $produkModel = model('ProductModel');
        $data = $this->request->getPost();
        $file = $this->request->getFile('foto');

        if (!$file->hasMoved()) {
            $path = $file->store('images');
            $data['foto'] = $path;
        }

        if ($produkModel->insert($data, false)) {
            return redirect()->to('admin/product')->with('success', 'Produk Berhasil Disimpan!');
        } else {
            return redirect()->back()->with('error', 'Produk Gagal Disimpan!');
        }
    }

    public function edit_product($id)
    {
        $produkModel = model('ProductModel');
        $categoriModel = model('CategoryModel');

        $data['produk'] = $produkModel->find($id);
        $data['category'] = $categoriModel->findAll();

        if (!$data['produk']) {
            return redirect()->to('admin/product')->with('error', 'Produk tidak ditemukan.');
        }
        return view('admin/edit-product', $data);
    }

    public function update_product($id)
    {
        $produkModel = model('ProductModel');
        $validation = $this->validate([
            'nama_produk' => 'required|min_length[3]|max_length[100]',
            'harga' => 'required|numeric',
            'id_kategori' => 'required|numeric',
            'foto' => 'is_image[foto]|max_size[foto,1024]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'id_kategori' => $this->request->getPost('id_kategori'),
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/images', $fileName);
            $data['foto'] = 'images/' . $fileName;

            $existingProduct = $produkModel->findAll($id);
            if (!empty($existingProduct['foto']) && file_exists('uploads/' . $existingProduct['foto'])) {
                unlink('uploads/' . $existingProduct['foto']);
            }
        }

        $produkModel->update($id, $data);
        return redirect()->to('admin/product')->with('success', 'Produk berhasil diupdate.');
    }

    public function delete_product($id)
    {
        $produkModel = model('ProductModel');
        $existingProduct = $produkModel->find($id);

        if ($existingProduct) {
            if (!empty($existingProduct['foto']) && file_exists('uploads/' . $existingProduct['foto'])) {
                unlink('uploads/' . $existingProduct['foto']);
            }
            $produkModel->delete($id);
        }
        return redirect()->to('admin/product')->with('success', 'Produk berhasil dihapus.');
    }

    // Contact
    public function contact()
    {
        $contactModel = model('ContactModel');
        $data['contacts'] = $contactModel->findAll();
        return view('admin/contact', $data);
    }

    public function create_contact()
    {
        $contactModel = model('ContactModel');
        $validation = $this->validate([
            'nama' => 'required|min_length[3]|max_length[100]',
            'no_telepon' => 'required|max_length[15]',
            'email' => 'required|valid_email|max_length[100]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $contactModel->save($data);
        return redirect()->to('/admin/contact')->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit_contact($id)
    {
        $contactModel = model('ContactModel');
        $data['contact'] = $contactModel->find($id);

        if (!$data['contact']) {
            return redirect()->to('admin/contact')->with('error', 'Kontak tidak ditemukan.');
        }
        return view('admin/edit-contact', $data);
    }

    public function update_contact($id)
    {
        $contactModel = model('ContactModel');
        $validation = $this->validate([
            'nama' => 'required|min_length[3]|max_length[100]',
            'no_telepon' => 'required|max_length[15]',
            'email' => 'required|valid_email|max_length[100]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $contactModel->update($id, $data);
        return redirect()->to('admin/contact')->with('success', 'Kontak berhasil diupdate.');
    }

    public function delete_contact($id)
    {
        $contactModel = model('ContactModel');
        $contactModel->delete($id);

        return redirect()->to('admin/contact')->with('success', 'Kontak berhasil dihapus.');
    }
}
