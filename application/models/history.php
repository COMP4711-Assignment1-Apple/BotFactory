<?php
class History extends CI_Model
{

	// transactionId | customerName | date | category | price | description | partId
    // Primary Key "transactionId"
    // AutoIncrement "transactionId"
    //
    // USE THIS ^
    //
    //purchases, assemblies, and shipments;
	var $data = array(
		array(
            'transactionID' => 1,
			'customerName' => 'Dalton',
			'category' => 'Recycling',
			'price' => 20,
			'description' => 'Did not like the product',
			'date' => '02-08-2017 08:30',
            'partID' => 11
			),
//		array(
//			'transactionID' => 2,
//			'who' => 'Jason',
//			'category' => 'Shipments',
//            'which' => 'parts',
//			'type' => 'Ordered',
//			'price' => 100,
//			'description' => 'order a view more parts to the collection',
//			'date' => '02-08-2017 12:20',
//            'quantity' => 5,
//            'partID' => 11
//             ),
//      array(
//			'transactionID' => 3,
//			'who' => 'Arnold',
//			'category' => 'Assemblies',
//			'type' => 'Built',
//			'price' => 125,
//			'description' => 'Arnold built a robot',
//			'date' => '02-08-2017 13:00',
//            'quantity' => 5,
//            'robotID' => 7
//            ),
//      array(
//			'transactionID' => 4,
//			'who' => 'Dalton',
//			'category' => 'Shipments',
//			'type' => 'Arrived',
//			'price' => 40,
//			'description' => 'Recieved a shipment of parts',
//			'date' => '02-07-2017 12:00',
//            'quantity' => 5,
//            'partID' => 1
//			),
//      array(
//			'transactionID' => 5,
//			'who' => 'Jason',
//			'category' => 'Shipments',
//			'type' => 'Ordered',
//			'price' => 2000,
//			'description' => 'order a view more parts to the collection',
//			'date' => '02-09-2017 15:00',
//            'quantity' => 40,
//            'partID' => 18
//			),
//      array(
//			'historyID' => 6,
//			'who' => 'Jason',
//			'category' => 'Purchases',
//			'type' => 'Purchased',
//			'price' => 50,
//			'description' => 'Jason purchased a part',
//			'date' => '02-08-2017 20:20',
//            'quantity' => 2,
//            'partID' => 13
//			),
//      array(
//			'historyID' => 7,
//			'who' => 'Dalton',
//			'category' => 'Shipments',
//			'type' => 'Arrived',
//			'price' => 100,
//			'description' => 'Shipment arrived and viewed by dalton',
//			'date' => '02-08-2017 12:00',
//            'quantity' => 2,
//            'robotID' => 4
//			),
//      array(
//			'historyID' => 8,
//			'who' => 'Arnold',
//			'category' => 'Purchases',
//			'type' => 'Returned',
//			'price' => 500,
//			'description' => 'Arnold didn\'t like the part/products',
//			'date' => '02-08-2017 12:00',
//            'quantity' => 10,
//            'robotID' => 4
//			),
//       		array(
//			'historyID' => 9,
//			'who' => 'Dalton',
//			'category' => 'Assemblies',
//			'type' => 'Ordered',
//			'price' => 250,
//			'description' => 'Built a robot',
//			'date' => '02-08-2017 12:00',
//            'quantity' => 10,
//            'robotID' => 8
//			),
//		array(
//			'historyID' => 10,
//			'who' => 'Arnold',
//			'category' => 'Shipments',
//			'type' => 'Arrived',
//			'price' => 50,
//			'description' => 'The missing parts have arrived from the
//							shipment containers from the shore line. The parts will
//							be inspected later on in the day.',
//			'date' => '02-08-2017 12:00',
//            'quantity' => 1,
//            'partID' => 16
//			)
	);
	
	// Constructor
	function __construct()
	{
		parent::__construct();
	}
	
	// retrieve a single record
	function get($which)
	{
		foreach ($this->data as $record)
			if ($record['transactionID'] == $which)
				return $record;
		return null;
	}
	
	public function count()
	{
        return sizeof($this->data);
    }

	// retrieve all of the records
	function all()
	{
		return $this->data;
	}


	public function getSpent()
	{
		$moneySpent = 0;
		foreach ($this->data as $record) 
		{
			if ($record['category'] == 'Consuming')
			{
				$moneySpent += $record['price'];
			}
		}
		return $moneySpent;
	}


	public function getEarned()
	{
		$moneyEarned = 0;
		foreach ($this->data as $record) 
		{
			if ($record['category'] == 'Recycling')
			{
				$moneyEarned += $record['price'];
			}
		}
		return $moneyEarned;
	}
}