<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel admin\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'moduleId' => 'gridviewKrajee',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => require(__DIR__.'/_columns.php'),
        'toolbar' =>
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Article','class'=>'btn btn-default']).
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                '{toggleData}'.
                '{export}'
            ],
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'panel' => [
            'type' => 'primary',
            'heading' => '<i class="glyphicon glyphicon-list"></i> Articles list',
            'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
            '<div class="clearfix"></div>',
        ]
    ]); ?>

    <?php Pjax::end(); ?>
</div>
