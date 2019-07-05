

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1> Suppresion du mail </h1>
<?php

if($_GET['mail']){
    $adressemail= $_GET['email'];
    $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci','carp310M');

    $selectall = $db->query('SELECT * FROM "julien.fayeulle@gmail.com" WHERE mail="'.$adressemail.'"');
    $result=$selectall->fetch();
    $counttable = (count($result));

    if($counttable >= 1 ){
$delete = $db->prepare('DELETE FROM "julien.fayeulle62@gmail.com" WHERE mail="'.$adressemail.'"');
$delete->execute();    
}
//confirmation de suppression
echo("Votre etes bien desabonne de notre liste de diffusion");
}

?>
<a href="https://je-code.com/exercices/exercice23-supression-mail-bdd/supression-mail.php?email=nono.predot@gmail.com"> Desinscrivez vous</a>

</body>
</html>

//$delete = $db -> prepare ("DELETE FROM jfayeullemail WHERE email='mail'");
//$delete->execute(); 

?>