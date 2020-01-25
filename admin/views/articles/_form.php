<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \admin\models\Categories;

/* @var $this yii\web\View */
/* @var $model admin\models\Articles */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("CKEDITOR.plugins.addExternal('videodetector', '/ckeditor/plugins/videodetector/')");
$this->registerJs("CKEDITOR.editorConfig = function(config) {
    config.language = 'ru';
    config.extraPlugins = 'videodetector';
}");

?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->widget(CKEditor::className(), [
        'options' => ['rows' => 2],
        'preset' => 'basic',
        'clientOptions' => [
            'customConfig' => '/ckeditor/ckeditor.js',
            ]
        ]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions' => [
            'customConfig' => '/ckeditor/ckeditor.js',
        ]]) ?>

    <?php
    $categories = ArrayHelper::map(Categories::find()->all(), 'id','title');
    echo $form->field($model, 'category_id')->dropDownList($categories) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
