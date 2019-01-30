<?= view('layout/header') ?>
<?= view('layout/nav') ?>
<h2>Page d'admin pour les tags</h2>

<div class="col-6 mx-auto">
	<form class="p-3 mb-2 bg-dark text-white rounded" method="POST">
	    <div id="id_modification" class="form-group">
	        <label for="id">ID du tag</label>
	        <input class="form-control" type="text" placeholder="<?= $currentTag->id ?>" readonly>
	        <medium id="idHelp" class="form-text ">Aucune modification possible sur l'id du tag
	    </div>
	    <div class="form-group">
	        <label for="name">Nom</label>
	        <input type="texte" class="form-control" name="name" id="texte" value="<?= $currentTag->name ?>">
	    </div>
        <div class="text-center">
	        <button type="submit" class="btn btn-light">Modifier</button>
        </div>
	</form>
</div>
<?= view('layout/footer') ?>