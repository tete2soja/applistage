<!doctype html>
<html>
	<script src="bootstrap/js/jquery-1.10.2.min.js"></script>
	<script src="bootstrap/js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<head>
		<meta charset="UTF-8" />
		<title>Saisie Fiche</title>
		<style type="text/css">
		html{
			background: #262626;
		}
		a{
			text-decoration: none; color: #333;
		}
		h1{
			margin: 10px 0;
		}
		p{
			margin: 8px 0.
		}
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-font-smoothing: antialiased;
			-moz-font-smoothing: antialiased;
			-o-font-smoothing: antialiased;
			font-smoothing: antialiased;
			text-rendering: optimizeLegibility;
		}
		body{
			font: 12px;
			text-transform: inherit;
			background-color: #262626;
			width: 100%;
			line-height: 18px;
		}
		.wrap{
			width: 1000px;
			margin: 15px auto;
			padding: 20px 25px;
			background: #989898;
			border: 3px solid #DBDBDB;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			overflow: hidden;
			text-align: center;
		}
		</style>
	</head>
	<body>
		<div class="wrap">
			<h1>Formulaire de saisie pour la fiche du stage</h1>
			<br />
			<label for="inputEmail3" class="col-sm-2 control-label" >Élément</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputEmail3" placeholder="" disabled>
			</div>
			<br/><br/><br />
			<form class="form-horizontal" role="form" method="POST" action="test.php">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label" >Dernière modification</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Contact en cas d'urgence (nom et téléphone)</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Représentant légal (prénom, nom)</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">adresse</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">téléphone</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Sujet du stage</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Origine de l'offre</label>
			    <div class="col-sm-10">
			      	<select class="form-control">
					  <option>offre_iut</option>
					  <option>etudiant</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nom de l'entreprise</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Type d'entreprise</label>
			    <div class="col-sm-10">
			      	<select class="form-control">
					  <option>entreprise</option>
					  <option>secteur-public</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">URL de l'entreprise</label>
			    <div class="col-sm-10">
			      <input type="url" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Adresse de l'entreprise</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">code postal</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">pays</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Responsable technique : nom</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">téléphone</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Responsable administratif : nom</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">téléphone</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">adresse</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Adresse du lieu du stage</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Type de convention</label>
			    <div class="col-sm-10">
			      	<select class="form-control">
					  <option>en-francais</option>
					  <option>en-anglais</option>
					  <option>par-entreprise</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Durée du stage en semaines</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="inputPassword3" placeholder="10">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Date de début de stage</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputPassword3" placeholder="13/06/2014">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Date de fin de stage</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputPassword3" placeholder="13/06/2014">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Stage à durée allongée</label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nombre de jours travaillés par semaine</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Horaire hebdomadaire maximum</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Conditions particulières de stage</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Rétribution proposée</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">montant mensuel prévu</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">en nature</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Description détaillée du sujet de stage</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Votre mission :</label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1"> Analyse
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label"></label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1"> Conception
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label"></label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1"> Réalisation
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label"></label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1"> Test
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label"></label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1"> Mise en production
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Environnement de développement - Outils et Langages</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Stage accepté</label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Convention validée</label>
			    <div class="col-sm-10">
			      <input type="checkbox" id="inlineCheckbox1" value="option1" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Etat de la convention</label>
			    <div class="col-sm-10">
			      	<select class="form-control" disabled>
					  <option>-</option>
					  <option>imprimée</option>
					  <option>envoyée</option>
					  <option>retournée</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Observations du responsable</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" rows="3" disabled></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">RAZ</button>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Valider</button>
			    </div>
			  </div>
			</form>
		</div>
	</body>
</html>