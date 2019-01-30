<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div class="d-flex justify-content-between mb-3">
    <h2>Liste de nos tags</h2>
    <a href="<?= route('admin_tag_create') ?>" role="button" class="btn btn-light align-self-center">Ajouter un tag</a>
</div>

<table class="table table-hover table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Modification</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tags as $tag) : ?>
        <tr>
            <th><?= $tag->id ?></th>
            <td><?= $tag->name ?></td>
            <th><a href="<?= route('admin_tag', ['id' => $tag->id]) ?>">Modifier</a></th>
            <th><a href="<?= route('admin_tag_delete', ['id' => $tag->id]) ?>">Supprimer</a></th>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<h2>Liste de nos quizz</h2>

<table class="table table-hover table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Auteur</th>      
            <th scope="col">Modification</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($quizzes as $quiz) : ?>
        <tr>
            <th><?= $quiz->id ?></th>
            <td><?= $quiz->title ?></td>
            <td><?= $quiz->description ?></td>
            <td><?= $quiz->user->firstname . ' ' . $quiz->user->lastname ?></td>
            <td><a href="<?= route('admin_quiz', ['id' => $quiz->id]) ?>">Modifier</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<h2>Liste de nos questions</h2>

<table class="table table-hover table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Questions</th>
            <th scope="col">Anecdote</th>
            <th scope="col">Wiki</th>
            <th scope="col">Level Id</th>
            <th scope="col">Réponse Id</th>
            <th scope="col">Modification</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($questions as $question) : ?>
        <tr>
            <th><?= $question->id ?></th>
            <td><?= $question->question ?></td>
            <td><?= $question->anecdote ?></td>
            <td><?= $question->wiki ?></td>
            <td><?= $question->level->name ?></td>
            <td><?= $question->answer->description ?></td>
            <th><a href="<?= route('admin_question', ['id' => $question->id]) ?>">Modifier</a></th>
        </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= view('layout/footer') ?>
