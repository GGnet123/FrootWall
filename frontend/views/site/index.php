<?php

/* @var $this yii\web\View */

use \yii\helpers\Html;

$this->title = 'FrootWall';
?>

<div>
    <?php
    foreach ($categories as $category) {
        echo
            "<h1 style='border: 1px solid black; 
                        display: inline-flex; 
                        flex-direction: row; 
                        flex-wrap: wrap; 
                        margin-right: 3%;'>"
                        . Html::a($category->title, 'index?data=' . $category->id, ['class' => 'categories']) .
            "</h1>";
    }
    ?>

<div style='display: flex; justify-content: space-between;'>
    <?php
    if ($articles) {
            foreach ($articles as $article)
                echo  "<div class='flex-container' 
                            style='display: flex; 
                            flex-direction: column;'>
                        <h1>" . $article->title ."</h1> 
                        <p style='margin-top: 10%'>" . $article-> content. "</p>
                        </div>";
    }
    ?>
</div>
</div>
