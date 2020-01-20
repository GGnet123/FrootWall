<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel admin\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Articles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => require(__DIR__.'/_columns.php'),
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<!---->
<!--[-->
<!--['class' => 'yii\grid\SerialColumn'],-->
<!---->
<!--'id',-->
<!--'title',-->
<!--'category_id' => ,-->
<!--['class' => 'yii\grid\ActionColumn'],-->
<!--],-->