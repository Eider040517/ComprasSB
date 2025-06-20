<?php
require_once __DIR__ . '/DataBase.php';

class DataInvoice extends DataBase
{
    private $conn;

    public function __construct()
    {
        $this->conn = parent::getInstance()->getConnection();
    }

    public function getDataInvoicesAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM data_invoice");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInvoiceById($invoiceId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM data_invoice WHERE index = :id");
        $stmt->bindParam(':id', $invoiceId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Usage example
$dataInvoice = new DataInvoice();
$invoices = $dataInvoice->getDataInvoicesAll();
foreach ($invoices as $invoice) {
     echo "Codigo " . $invoice['CODIGO'] . ", Codigo de Invetario: " . $invoice['COD_INV'] . ", Descripcion ". $invoice['DESCRIP']. ", Precio Lanend ". $invoice['LANDED_TOTAL']. "<br>";
 }