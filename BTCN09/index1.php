<?php
$db = new PDO('mysql:host=localhost;dbname=pain;charset=utf8', 'root', '');


//1-Lay tung dong du lieu
// while($row = $stmt->fetch(PDO::FETCH_ASSOC) )   {
//     echo $row['email'] . '----- ' . $row['displayName']; 
// }
//2-Lay het toan bo du lieu
// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// for ($i = 0; $i < count($data); $i++)   {
//     $row = $data[$i];
//     echo $row['email'];
// }
//3-insert
// $displayName = $_GET['displayName'];
// $email = $_GET['email'];
// $password = $_GET['password'];

// $stmt = $db->prepare("INSERT INTO users(displayName, email, password) VALUE(?,?,?)" );
// $stmt->bindValue(1, $displayName, PDO::PARAM_STR);
// $stmt->bindValue(2, $email, PDO::PARAM_STR);
// $stmt->bindValue(3, $password, PDO::PARAM_STR);
// $stmt->execute();
// $insertId = $db->lastInsertId();

// echo $insertId;
//4-
// $stmt = $db->query("SELECT * FROM users");
// $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($row);
//5-
//$password = '123456';
//$2y$10$Arq1SZkvVn4oGInMuuuhvOQYvhgiF8VeaCSE9EWf9BhgA5cDCPE8K
//$hashPAssword = password_hash($password, PASSWORD_DEFAULT);
//$password = Hash::make('123456');
//$hashpassword = Hash::make($password);

//$result = password_verify($password, $hashPAssword);






//echo $hashPAssword;

//echo $result;