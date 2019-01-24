<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<h3>Welcome Username</h3>

<div class="row">

    <?php foreach($quizzes as $quiz): ?>
        <div class="col-sm-4 quizz_cards" style="background-image: url(../public/assets/img/<?= $quiz->id ?>.jpg)">
        <div class="quizz_bloc">
            <h3><a class="quizz_title" href="<?= route('quizgame', ['id' => $quiz->id]) ?>"><?= $quiz->title ?></a></h3>
            <h5  class="quizz_under-title"><?= $quiz->description ?></h5>
            <p>
                by <?php $appUserForCurrentQuiz = $appUsers->firstWhere('id',$quiz->app_users_id);
                echo $appUserForCurrentQuiz->firstname .' '. $appUserForCurrentQuiz->lastname;?>
            </p>
            </div>
        </div>
    <?php endforeach ?>
 
</div>

<?= view('layout/footer') ?>