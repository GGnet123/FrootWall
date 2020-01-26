<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model admin\models\Articles */

$this->title = 'Создание статьи';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
