<?php

namespace App\Controllers;

use App\Models\productcategoryModel;

class ProductKategoriController extends BaseController
{
    protected $product; 

    function __construct()
    {
        $this->product = new productcategoryModel();
    }

    public function index()
    {
        $product = $this->product->findAll();
        $data['product_category'] = $product;

        return view('v_produkKategori', $data);
    }

    // Fungsi create yang benar
public function create()
{
    $dataForm = [
        'category_name' => $this->request->getPost('category_name'),
        'description'   => $this->request->getPost('description'),
        'created_at'    => date("Y-m-d H:i:s")
    ];

    $this->product->insert($dataForm);
    return redirect()->to('produkKategori')->with('success', 'Kategori berhasil ditambahkan');
}


// Fungsi edit yang benar
public function edit($id)
{
    $dataForm = [
        'category_name' => $this->request->getPost('category_name'),
        'description'   => $this->request->getPost('description'),
        'updated_at'    => date("Y-m-d H:i:s")
    ];

    $this->product->update($id, $dataForm);
    return redirect()->to('produkKategori')->with('success', 'Kategori berhasil diubah');
}

// Fungsi delete yang benar
public function delete($id)
{
    $this->product->delete($id);
    return redirect()->to('produkKategori')->with('success', 'Kategori berhasil dihapus');
}

}