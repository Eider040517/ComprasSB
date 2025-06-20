<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class Supplier
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllSuppliers()
    {
        $query = "SELECT * FROM supplier";
        
        $data = "Data fetched successfully";
        return $data;
    }

    public function getSupplierById($id)
    {
        $query = "SELECT * FROM suppliers WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}