<?php exit("Permission Denied"); ?>
2015-01-28 16:31:22
array (
  'db' => 'levis',
  'collection' => 'aevitaslog',
  'action' => 'collection.index',
  'format' => 'json',
  'criteria' => '{
"user.$id": 170032
}',
  'newobj' => '{
	\'$set\': {
		//your attributes
	}
}',
  'field' => 
  array (
    0 => '_id',
    1 => '',
    2 => '',
    3 => '',
  ),
  'order' => 
  array (
    0 => 'desc',
    1 => 'asc',
    2 => 'asc',
    3 => 'asc',
  ),
  'limit' => '0',
  'pagesize' => '10',
  'command' => 'findAll',
)
================
2015-01-29 15:38:58
array (
  'db' => 'levis',
  'collection' => 'aevitaslog',
  'action' => 'collection.index',
  'format' => 'json',
  'criteria' => '{
"schema.BillIDNo":"45072904306201"
}',
  'newobj' => '{
	\'$set\': {
		//your attributes
	}
}',
  'field' => 
  array (
    0 => '_id',
    1 => '',
    2 => '',
    3 => '',
  ),
  'order' => 
  array (
    0 => 'desc',
    1 => 'asc',
    2 => 'asc',
    3 => 'asc',
  ),
  'limit' => '0',
  'pagesize' => '10',
  'command' => 'findAll',
)
================
