		<? include $_SERVER['DOCUMENT_ROOT'].'/applistage/fuel/app/views/header.php' ; ?>		
<form method="POST" action="formulaireUpload.php" enctype="multipart/form-data">
     Fichier : <input type="file" name="CSVinputFile">
     <input type="submit" name="envoyer" value="Envoyer le fichier .csv">
</form>


		
		
		<? include $_SERVER['DOCUMENT_ROOT'].'/applistage/fuel/app/views/footer.php' ; ?>
