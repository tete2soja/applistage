		<? include $_SERVER['DOCUMENT_ROOT'].'/applistage/fuel/app/views/header.php' ; ?>		
<form method="POST" action="formulaireUpload.php" enctype="multipart/form-data">
     Fichier : <input type="file" name="CSVinputFile">
     <input type="submit" name="envoyer" value="Envoyer le fichier .csv">
</form>


<?php
$dossier = 'upload/';  // mettre ici le chemin que va emprunter le fichier
$fichier = basename($_FILES['CSVinputFile']['name']);
$extensions = array('.csv');
$extension = strrchr($_FILES['CSVinputFile']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type csv';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['CSVinputFile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
?>
		
		
		<? include $_SERVER['DOCUMENT_ROOT'].'/applistage/fuel/app/views/footer.php' ; ?>
