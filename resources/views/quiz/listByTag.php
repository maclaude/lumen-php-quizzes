<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div>
    <h2> Bienvenue sur O'Quiz <?php if($isConnected): echo $currentUser->firstname; endif; ?></h2>
    <p>

    <?php if (!$isConnected): ?>
    </p>
    Première visite : créez-vous un <a href="<?= route('user_signup') ?>">compte</a> !
    Vous pouvez consulter les différents quiz en cliquant sur leurs titres.</p>
    <p>En revanche pour pouvoir y répondre, <a href="<?= route('user_signin') ?>">identifiez-vous</a>.
    <?php endif ?>

    <p>Let's play !
    
    </p>
</div>

<div class="row">

    <?php foreach ($currentTag->quizzes as $quiz) : ?>
    <div class="col-4 mb-4">
        <div class="quizz_cards" style="background-image: url(../public/assets/img/<?= $quiz->id ?>.jpg)">

            <div class="quizz_bloc">
                <h3><a class="quizz_title" href="<?= route('quiz_show', ['id' => $quiz->id]) ?>"><?= $quiz->title ?></a></h3>
                <h5  class="quizz_under-title"><?= $quiz->description ?></h5>
                <p>
                    by <?= $quiz->user->firstname . ' ' . $quiz->user->lastname ?>
                </p>
                <div>   
                    <?php foreach ($quiz->tags as $tag) : ?>
                        <a class="btn btn-light btn-sm mr-1 color_<?= $tag->id ?>" href="<?= route('quiz_list_by_tag', ['id' => $tag->id]) ?>" ><?= $tag->name ?></a>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </div>
    <?php endforeach ?>
 
</div>

<?= view('layout/footer') ?>