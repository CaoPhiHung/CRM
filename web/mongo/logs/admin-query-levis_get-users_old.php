<?php exit("Permission Denied"); ?>
2015-04-13 22:55:55
array (
  'db' => 'levis_get',
  'collection' => 'users_old',
  'action' => 'collection.index',
  'format' => 'json',
  'criteria' => '{
	"email":"jayesh.it@thanbacgroup.com"
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
