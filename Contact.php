 
 <?php

//en php ne pas oublier d'insserer toute les infos des formulaires principalement les names qui servent de variables
if(isset($_POST["Validate"])){
    //$_POST est tres important car cest pour method="post"
    if(!isset($_POST["message"]) || ($_POST["message"]=='')){
    echo"vous avez oublié d'insérer un message";    
    }

else{
    if(isset($_POST["Validate"])){
        if(!isset($_POST["email"]) || ($_POST["email"]==null)){
            $_POST["email"]='';
        }
        //assignation de la variable si aucun adresse mail renseigné
         $mmessage = "vous avez recu un message via votre site internet, le voici : " . $_POST["message"];
        mail('julien.fayeulle62@gmail.com',"formulaire de contact Exmachina,",$mmessage);
            echo"votre message a été envoyé";
    }
   
//récuperation du mail dans la base de donnée
//si la case a cocher est activé
    elseif(isset($_POST["autorisation"])){
        $adressemail=$_POST["email"];
        //connection a la base de donnée
        $db= new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci','carp310M');
        //insertion des nouveaux entrées
        //le : de :adressemail est important pour une donnée attendu par l'utilisateur
        $result= $db->prepare('INSERT INTO jfayeulleMail(mail) VALUES(:adressemail)');
        //mise en place du tableau
            $result->execute(array($_POST[email]));
        
    }
}
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    
    <!--<script type="text/javascript">
    //placement d'une fonction
    function validationFormulaire() {
    //document.forms qui collecte les données de formulaire du document et .value les noms de values    
        var x = document.forms["formulaire"]["message"].value;
        //condition x qui etait la variable en rapport a au dessus
        if(x == null || x == ''){
            alert("vous avez oublié d'insérer un message");
            //return pour retourner la valeur en false car y a pas de message
            return false;
        }
    }
          
    </script> -->
<style type="text/css">
    a{
        text-decoration: none;
    }
    
    </style>
</head>

<body>
    <form method="post" name="formulaire" onsubmit="validationFormulaire()">
    
    <label for="Name">Name </label><input type="text" placeholder="Name" autofocus><br>
    <label for="Mail">Mail </label><input type="email" name="email" placeholder="nom@domaine.com"><br>
    <label for="phone">Phone </label> <input type="tel"> <br><br>
    <textarea name="message" cols="15" placeholder="commentaries" rows="5" maxlength="500"></textarea><br>
     <input type="checkbox" name="autorisation">j'autorise a prendre mes coordonnées. <br>
    <input type="submit" name="Validate" value="Validate">    
    <a href="index.html"><input type="button" value="Return"></a>
    </form>
</body>
</html>