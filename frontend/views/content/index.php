<?php
foreach ($content as $item) { ?>
    <h1><?= $item->title ?></h1>
    <p><?= $item->content ?></p>
<?php }

use yii\helpers\Html; ?>

<div class="comments">
    <?php if ($commentsCnt >= 1): ?>
        <h3>
            <?php echo $commentsCnt . ' comment(s)'; ?>
        </h3>
        <ul>
            <?php foreach ($comments as $item) {
                echo '<li> Title: ' . $item->title . '<br>' . ' User: ' . $item->user . '<br>' . ' date: ' . $item->created_at . '<br>' . 'Comment: ' . $item->comment . '</li>';
            }
            ?>
        </ul>
    <?php endif; ?>
</div>
<div class="add-comment-form">
    <?php
    $form = \yii\widgets\ActiveForm::begin();
    echo $form->field($model, 'title');
    echo $form->field($model, 'comment');
    ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end();
    ?>
</div>
