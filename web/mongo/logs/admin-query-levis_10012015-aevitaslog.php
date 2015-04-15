<?php exit("Permission Denied"); ?>
2015-01-28 17:02:15
array (
  'db' => 'levis_10012015',
  'collection' => 'aevitaslog',
  'action' => 'collection.index',
  'format' => 'json',
  'criteria' => '{
"user.$id": 169362
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
