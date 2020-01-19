<?php

/* @var $this yii\web\View */

use \yii\helpers\Html;

$this->title = 'FrootWall';
?>

<div>
    <?php
    foreach ($categories as $category) {
        echo
            "<h1 class='category'>"
                        . Html::a($category->title, 'index?data=' . $category->id, ['class' => 'categories']) .
            "</h1>";
    }
    ?>

<div class="container">
    <?php
    if ($articles) {
            foreach ($articles as $article)
                echo  "<div class='flex-container'>
                        <h1>" . $article->title ."</h1> 
                        <p class='content'>" . $article-> content. "</p>
                        </div>";
    }
    ?>
</div>
</div>
