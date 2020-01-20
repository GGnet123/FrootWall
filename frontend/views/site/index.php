<?php

/* @var $this yii\web\View */

use \yii\helpers\Html;

$this->title = 'FrootWall';
?>

<div class="main-container">
    <div class="categories">
    <?php
    foreach ($categories as $category) {
        echo
            "<div class='categories-items'><h1>"
                        . Html::a($category->title, 'index?data=' . $category->id, ['class' => 'categoriesHref']) .
            "</h1></div>";
    }
    ?>
    </div>
<div class="articles">
    <?php
    if ($articles) {
            foreach ($articles as $article)
                echo  "<div class='articleContent'>
                        <h1>" . $article->title ."</h1> 
                        <p style='margin-top: 10%'>" . $article-> content. "</p>
                        </div>";
    }
    ?>
</div>
</div>
