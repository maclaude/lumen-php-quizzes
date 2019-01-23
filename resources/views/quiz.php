<?= view('layout/header') ?>
<?= view('layout/nav') ?>
    
<div class="row">
    <h2> <?= $quiz->title ?>
        <span class="badge badge-pill badge-secondary">xx questions</span>
    </h2>
</div>

<div class="row">
    <h4> 
        <?= $quiz->description ?>
    </h4>
</div>

<div class="row">
    <p>
        <?php $appUserForCurrentQuiz = $appUsers->firstWhere('id',$quiz->app_users_id);
        echo $appUserForCurrentQuiz->firstname .' '. $appUserForCurrentQuiz->lastname;?>
    </p>
</div>

<div class="row">

    <?php foreach($questions as $question): ?>
        <div class="col-sm-3 border p-0 m-4" >

            <span class="badge badge-success float-right mt-2 mr-2">Débutant</span>

            <div class="p-3 background-grey">
                <?= $question->question ?>
            </div>
            <div class="p-3 question-answer-block">
                <ul>
                    <li>1. Lorem ipsum </li>
                    <li>2. Lorem ipsum </li>
                    <li>3. Lorem ipsum </li>
                    <li>d. La réponse D </li>
                </ul> 
            </div>
        </div>
    <?php endforeach ?>
    
</div>

<?= view('layout/footer') ?>