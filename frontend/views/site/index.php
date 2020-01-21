<?php

/* @var $this yii\web\View */

use \yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'FrootWall';
?>

<div class="main-container">

<div class="articles">
    <?php
    if ($models) {
            foreach ($models as $model)
                echo  "<div class='articleContent'> "
                        . Html::a($model->title,['content/index', 'id'=>$model->id]) . "
                        <p style='margin-top: 10%'>" . $model-> short_description. "</p>
                        </div>";
            ?>
            <div class="pages">
                <?= LinkPager::widget([
                'pagination' => $pages,
                ]); ?>
            </div>
    <?php } ?>
</div>
</div>
