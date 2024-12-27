<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $productModel = model('ProductModel');
        $data['product'] = $productModel->findAll();
        return view('product', $data);
    }

    public function images($file)
    {
        return $this->response->download(WRITEPATH . 'uploads/images/' . $file, null);
    }

    public function detail_product($id)
    {
        $productModel = model('ProductModel');
        $data['produk'] = $productModel
            ->select('produk.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = produk.id_kategori', 'left')
            ->find($id);

        if (!$data['produk']) {
            return redirect()->to('/product')->with('error', 'Produk tidak ditemukan');
        }

        return view('detail-product', $data);
    }

    public function contact()
    {
        $contactModel = model('ContactModel');
        $data['contacts'] = $contactModel->findAll();
        return view('contact', $data);
    }
}
