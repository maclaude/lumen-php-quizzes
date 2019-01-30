<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div class="col-6 mx-auto">
	<form class="p-3 mb-2 bg-dark text-white rounded" method="POST">
	    <div id="id_modification" class="form-group">
	        <label for="id">Quizz ID</label>
	        <input class="form-control" type="text" placeholder="<?= $currentQuiz->id ?>" readonly>
	        <medium id="idHelp" class="form-text ">Aucune modification possible sur l'id de la question</medium>
	    </div>
	    <div class="form-group">
	        <label for="title">Titre</label>
	        <input type="texte" class="form-control" name="title" id="texte" value="<?= $currentQuiz->title ?>">
	    </div>
	    <div class="form-group">
	        <label for="title">Description</label>
	        <input type="texte" class="form-control" name="description" id="texte" value="<?= $currentQuiz->description ?>">
	    </div>
	    <div class="form-group">
	        <label for="User">Author</label>
	        <select class="form-control" name="user_id" id="select">
	            <?php foreach ($users as $user) : ?>
	            <option value="<?= $user->id ?>"><?= $user->firstname ?></option>
				<?php endforeach ?>
	        </select>
	    </div>
        <div class="text-center">
	        <button type="submit" class="btn btn-light">Modifier</button>
        </div>
	</form>
</div>

<?= view('layout/footer') ?>