<?php
	
	class InventoryAdjustment extends Db_object {
		
			protected static $db_table = "inventory_adjustments";

			protected static $db_table_fields = array('id', 'item', 'date', 'adjustment_type', 'current_quantity', 'purchased_quantity', 'purchased_cost', 'distribution_cost', 'supplier', 'serial_number', 'manufactured_date', 'expiry_date');

		public $id;
		public $item;
		public $date;
		public $adjustment_type;
		public $current_quantity;
		public $purchased_quantity;
		public $purchased_cost;
		public $distribution_cost;
		public $supplier;
		public $serial_number;
		public $manufactured_date;
		public $expiry_date;
		
		public static function find_by_item($item) {

			$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE item=$item");

			return !empty($the_result_array) ? array_shift($the_result_array) : false; 

		}//end of find by patient_number

	}// end of class
?>