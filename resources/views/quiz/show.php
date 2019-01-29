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
        <?= $quiz->user->firstname .' '. $quiz->user->lastname ?>
    </p>
</div>

<?php if (!empty($score)) : ?>
    <div class="alert alert-success" role="alert">
        <?= 'Votre score est de ' . $score . ' / ' . $count . ''?>
    </div>
<?php endif ?>

<form action="" method="POST">
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

            <?php $questionBackground = 'background-grey' ?>

            <?php if (!empty($userAnswerCorrect)) {
                if ($userAnswerCorrect[$question->id] == true) {
                    $questionBackground = 'alert-success';
                } elseif ($userAnswerCorrect[$question->id] == false) {
                    $questionBackground = 'alert-warning';
                }
            }
            ?>
            
            <div class="p-3 <?= $questionBackground ?>">
                <?= $question->question ?>
            </div>

            <?php if (!$isConnected) : ?>
                <div class="p-3 question-answer-block">
                    <ul>
                        <?php foreach ($questionAnswerList[$question->id] as $answer) : ?>
                            <li>
                                <?= $answer->description ?>
                            </li>
                        <?php endforeach ?>
                    </ul> 
                </div>
            <?php endif; ?>

            <?php if ($isConnected) : ?>
                <div class="p-3 question-answer-block">
                        <?php foreach ($questionAnswerList[$question->id] as $answer) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio-question-<?= $question->id ?>" id="radio-answer-<?= $answer->id ?>" value="<?= $answer->id ?>">
                                <label class="form-check-label" for="exampleRadios1">
                                    <?= $answer->description ?>
                                </label> 
                            </div>
                    <?php endforeach ?>         
                </div>

                <?php if (!empty($userAnswerCorrect)) : ?>
                    <div class="p-3 background-grey question-answer-block"> 
                        <?= $question->anecdote ?><hr>
                        <a href="https://fr.wikipedia.org/wiki/<?= $question->wiki ?>"> Plus d'info sur Wikipedia ici</a>
                    </div>
                <?php endif ?>
            
            <?php endif ?>
            
        </div>
    <?php endforeach ?>

</div>

<?php if ($isConnected) : ?>
    <div class="row mt-3">
        <input type="submit" class="mx-auto btn btn-primary background-blue btn-lg" value="Voir mon score"/>
    </div>
<?php endif ?>
</form>

<?= view('layout/footer') ?>