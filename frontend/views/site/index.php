<?php

/* @var $this yii\web\View */

use \yii\helpers\Html;

$this->title = 'FrootWall';
?>

<div class="main-container">

<div class="articles">
    <?php
    if ($articles) {
            foreach ($articles as $article)
                echo  "<div class='articleContent'> "
                        . Html::a($article->title,['content/index', 'id'=>$article->id]) . "
                        <p style='margin-top: 10%'>" . $article-> short_description. "</p>
                        </div>";
    }
    ?>
</div>
</div>
