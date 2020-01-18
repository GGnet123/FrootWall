<?php

use dosamigos\ckeditor\CKEditorInline;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \admin\models\Categories;

/* @var $this yii\web\View */
/* @var $model admin\models\Articles */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("CKEDITOR.plugins.addExternal('ckeditorMedia', '/ckeditorMedia/plugin.js', '');");

?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


<!--    --><?php //CKEditorInline::begin(['preset' => 'custom', 'clientOptions' => [
//        'extraPlugins' => 'ckeditorMedia',
//        'toolbarGroups' => [
//            ['name' => 'undo'],
//            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
//            ['name' => 'colors'],
//            ['name' => 'links', 'groups' => ['links', 'insert']],
//            ['name' => 'others', 'groups' => ['others', 'about']],
//
//            ['name' => 'ckeditorMedia']
//        ]
//    ]]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

<!--    --><?php //CKEditorInline::end() ?>

    <?php
    $categories = ArrayHelper::map(Categories::find()->all(), 'id','title');
    echo $form->field($model, 'category_id')->dropDownList($categories) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
