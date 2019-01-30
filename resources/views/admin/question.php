<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div class="col-6 mx-auto">
	<form class="p-3 mb-2 bg-dark text-white rounded" method="POST">
	    <div id="id_modification" class="form-group">
	        <label for="id">Question Id</label>
	        <input class="form-control" type="text" placeholder="<?= $currentQuestion->id ?>" readonly>
	        <medium id="idHelp" class="form-text ">Aucune modification possible sur l'id de la question</medium>
	    </div>
	    <div class="form-group">
	        <label for="title">Question</label>
	        <textarea type="texte" class="form-control" name="question" id="texte" rows="2"><?= $currentQuestion->question ?></textarea>
	    </div>
        <div class="form-group">
	        <label for="title">Anecdote</label>
	        <textarea type="texte" class="form-control" name="anecdote" id="texte" rows="2"><?= $currentQuestion->anecdote ?></textarea>
	    </div>
        <div class="form-group">
	        <label for="title">wiki URL</label>
	        <input type="texte" class="form-control" name="wiki" id="test" value="<?= $currentQuestion->wiki ?>">
	    </div>
        <div class="form-group">
	        <label for="User">Niveau de la question</label>
	        <select class="form-control" name="level_id" id="select">
	            <?php foreach ($levels as $level) : ?>
	            <option value="<?= $level->id ?>"><?= $level->name ?></option>
				<?php endforeach ?>
	        </select>
	    </div>
        <div class="form-group">
	        <label for="title">Réponse</label>
	        <input type="texte" class="form-control" name="answer_name" id="texte" value="<?= $currentQuestionAnswer->description ?>">
	    </div>
        <div class="text-center">
	        <button type="submit" class="btn btn-light">Modifier</button>
        </div>
	</form>
</div>

<?= view('layout/footer') ?>