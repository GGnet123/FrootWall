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
                        . Html::a($category->title, ['site/index', 'data' => $category->id], ['class' => 'categoriesHref']) .
            "</h1></div>";
    }
    ?>
    </div>
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
