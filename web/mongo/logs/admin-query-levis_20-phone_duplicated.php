<?php exit("Permission Denied"); ?>
2015-01-29 18:24:38
array (
  'db' => 'levis_20',
  'collection' => 'phone_duplicated',
  'action' => 'collection.index',
  'format' => 'json',
  'criteria' => '{
"cellphone":"0942408786"
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
