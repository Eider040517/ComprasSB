<?php
namespace App\Controllers;
use App\Core\Controller;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = $this->model('Supplier');
        $data = ['suppliers' => $supplier->getAllSuppliers()];
        $this->view('Suppliers', $data);
    }
}

