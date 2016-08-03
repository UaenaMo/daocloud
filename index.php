<?php
$dsn = "mysql:host=10.10.26.58:3306;dbname=wfcGVXBQNdz126YL";
$dbh = new PDO($dsn,'unBzKNg3JTrR0uxw','pAfp68HchMLEI1QFD');
$sql = "SELECT `name` FROM `user` WHERE `id` = ?";
$sth = $dbh->prepare($sql);
$sth->execute(array(1));
$result = $sth->fetch(PDO::FETCH_OBJ);
echo $result->name;
$dbh = NULL;
?>  
