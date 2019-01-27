<?= view('layout/header') ?>
<?= view('layout/nav') ?>

<div class="row">
    <h2> <?= $quiz->title ?>
        <span class="badge badge-pill badge-secondary"><?= $count ?> questions</span>
    </h2>
</div>

<div class="row">
    <h4> 
        <?= $quiz->description ?>
    </h4>
</div>

<div class="row">
    <p>
        <?= $quiz->user->firstname .' '. $quiz->user->lastname; ?>
    </p>
</div>

<div class="row">

    <?php foreach ($questions as $question) : ?>
        <div class="col-sm-3 border p-0 m-4 bg-white" >
            <?php 
                if ($question->levels_id == 1) {
                    $badgeClasse = 'badge-success';
                } elseif ($question->levels_id == 2) {
                    $badgeClasse = 'badge-warning';
                } elseif ($question->levels_id == 3) {
                    $badgeClasse = 'badge-danger';
                }
            ?>

            <span class="badge <?= $badgeClasse ?> float-right mt-2 mr-2">
                <?= $question->level->name ?>
            </span>

            <div class="p-3 background-grey">
                <?= $question->question ?>
            </div>
            <div class="p-3 question-answer-block">
                <ul>
                    <?php foreach ($questionAnswerList[$question->id] as $answer) : ?>
                        <li>
                            <?= $answer->description ?>
                        </li>
                    <?php endforeach; ?>
                </ul> 
            </div>
        </div>
    <?php endforeach ?>
    
</div>

<?= view('layout/footer') ?>