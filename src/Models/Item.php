<?php
namespace App\Models;

use App\Core\DataBase;
use PDO;

class Item
{
    private $db;

    public function __construct()
    {
        $this->db = DataBase::getInstance()->getConnection();
    }
    public function createItem(array $data)
    {
        $query = "INSERT INTO item (`internal_code`, `product_type`, `product_subtype`, `description`, `color_code`, `color_description`, `unit_usage`, `is_active`) 
        VALUES (:internal_code, :product_type, :product_subtype, :description, :color_code, :color_description, :unit_usage, :is_active)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':internal_code', $data['internal_code']);
        $stmt->bindParam(':product_type', $data['product_type']);
        $stmt->bindParam(':product_subtype', $data['product_subtype']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':color_code', $data['color_code']);
        $stmt->bindParam(':color_description', $data['color_description']);
        $stmt->bindParam(':unit_usage', $data['unit_usage']);
        $is_active = isset($data['is_active']) ? $data['is_active'] : 1;
        $stmt->bindParam(':is_active', $is_active, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateItem(array $data)
    {
        $query = "UPDATE item SET internal_code = :internal_code, product_type = :product_type, product_subtype = :product_subtype, 
        description = :description, color_code = :color_code, color_description = :color_description, unit_usage = :unit_usage, is_active = :is_active 
        WHERE item_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':internal_code', $data['internal_code']);
        $stmt->bindParam(':product_type', $data['product_type']);
        $stmt->bindParam(':product_subtype', $data['product_subtype']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':color_code', $data['color_code']);
        $stmt->bindParam(':color_description', $data['color_description']);
        $stmt->bindParam(':unit_usage', $data['unit_usage']);
        $is_active = isset($data['is_active']) ? $data['is_active'] : 1;
        $stmt->bindParam(':is_active', $is_active, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteItem($id)
    {
        $query = "DELETE FROM item WHERE item_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAllItems()
    {
        $query = "SELECT * FROM item";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItemById($id)
    {
        $query = "SELECT * FROM item WHERE item_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
