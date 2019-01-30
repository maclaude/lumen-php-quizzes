<?= view('layout/header') ?>
<?= view('layout/nav') ?>
<h2>Page de création pour les tags</h2>

<div class="col-6 mx-auto">
	<form class="p-3 mb-2 bg-dark text-white rounded" method="POST">
	    <div class="form-group">
	        <label for="name">Nom du tag</label>
	        <input type="texte" class="form-control" name="name" id="texte" placeholder="Entrer le nom ici">
	    </div>
        <div class="text-center">
	        <button type="submit" class="btn btn-light">Créer</button>
        </div>
	</form>
</div>
<?= view('layout/footer') ?>