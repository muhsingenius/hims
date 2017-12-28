<?php
	
	class Inventory extends Db_object {
		
			protected static $db_table = "inventory";

			protected static $db_table_fields = array('id', 'date', 'item_name', 'description', 'type', 'category', 'strength', 'dispensable_unit', 'quantity_in_package', 'number_of_package', 'original_quantity', 'current_quantity', 'reorder_level', 'supplier', 'manufactured_date', 'expiry_date', 'serial_number', 'purchase_cost', 'distribution_cost');

		public $id;
		public $date;
		public $item_name;
		public $description;
		public $type;
		public $category;
		public $strength;
		public $dispensable_unit;
		public $quantity_in_package;
		public $number_of_package;
		public $original_quantity;
		public $current_quantity;
		public $reorder_level;
		public $supplier;
		public $manufactured_date;
		public $expiry_date;
		public $serial_number;
		public $purchase_cost;
		public $distribution_cost;

	}// end of class
?>