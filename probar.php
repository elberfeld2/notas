<pre>
<?php
include('misql.php');
$db = new Database();
$db->connect();
$db->select('CRUDClass'); // Table name
$res = $db->getResult();
print_r($res);/*
$data = $db->escapeString("name5@email.com"); // Escape any input before insert
$db->insert('CRUDClass',array('name'=>'Name 5','email'=>$data));  // Table name, column names and respective values
$res = $db->getResult();*/
for($i=0;$i<4;$i++)
    print_r($res[1]);

?>

</pre>