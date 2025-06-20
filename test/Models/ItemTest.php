<?php
use PHPUnit\Framework\TestCase; 
use App\Models\Item;
class ItemTest extends TestCase
{
    private $item;

    protected function setUp(): void
    {
        $this->item = new Item();
    }

    public function testCreateItem()
    {
        $data = [
            'internal_code' => 'IC123',
            'product_type' => 'Type1',
            'product_subtype' => 'Subtype1',
            'description' => 'Test Item',
            'color_code' => 'C123',
            'color_description' => 'Red',
            'unit_usage' => 10,
            'is_active' => 1
        ];
        $result = $this->item->createItem($data);
        $this->assertTrue($result);
    }

    public function testUpdateItem()
    {
        $data = [
            'id' => 977,
            'internal_code' => 'IC1234',
            'product_type' => 'Type2',
            'product_subtype' => 'Subtype2',
            'description' => 'Updated Item',
            'color_code' => 'C124',
            'color_description' => 'Blue',
            'unit_usage' => 20,
            'is_active' => 1
        ];
        $result = $this->item->updateItem($data);
        $this->assertTrue($result);
    }

    public function testDeleteItem()
    {
        $result = $this->item->deleteItem(977);
        $this->assertTrue($result);
    }

    public function testGetAllItems()
    {
        $items = $this->item->getAllItems();
        $this->assertIsArray($items);
    }
}


