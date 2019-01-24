<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div class="row">
    <h2> Bienvenue sur O'Quiz </h2>
    <p>

    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    
    </p>
</div>

<div class="row">

    <?php foreach($quizzes as $quiz): ?>
        <div class="col-sm-4 quizz_cards" style="background-image: url(../public/assets/img/<?= $quiz->id ?>.jpg)">
        <div class="quizz_bloc">
            <h3><a class="quizz_title" href="<?= route('quiz', ['id' => $quiz->id]) ?>"><?= $quiz->title ?></a></h3>
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