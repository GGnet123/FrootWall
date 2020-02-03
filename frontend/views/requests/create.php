<div class="requestContainer">
<?php
$form = \yii\widgets\ActiveForm::begin([
    'id'=> 'requests-form',
    'options' => ['class'=>'request-form']
]); ?>

    <?php $categories = \yii\helpers\ArrayHelper::map(\admin\models\Categories::find()->all(),'id','title') ?>
    <?= $form->field($model,'category_id')->dropDownList($categories,['prompt'=>'Категории','id'=>'category']) ?>

    <?php $users = \yii\helpers\ArrayHelper::map(\admin\models\User::find()->all(),'id','full_name') ?>

    <?= $form->field($model, 'to_users_id')->widget(\kartik\depdrop\DepDrop::class,[
            'id' => 'usersSelect',
            'name' => 'usersSelect',
            'pluginOptions' => [
                    'depends'=>['category'],
                    'placeholder'=>'Сотрудники..',
                    'url'=>\yii\helpers\Url::to(['requests/users-by-category'])
            ],
    ]) ?>

    <div class="selected-users"></div>
    <?= $form->field($model, 'date')->widget(\kartik\date\DatePicker::class,[
            'options' => ['placeholder' => 'Дата ...','class'=>'datepicker','id'=>'date'],
            'pluginOptions' => [
                'format' => 'dd/mm/yyyy',
                'todayHighlight' => true
            ],
    ]) ?>

    <?= \dosamigos\fileupload\FileUploadUI::widget([
            'id'=>'docs_input',
            'model'=>$model,
            'attribute' => 'docs',
            'url' => 'index?r=requests/upload',
            'gallery' => false,
    ]) ?>

    <div class="form-group">
        <div class="">
            <?= \yii\helpers\Html::submitButton('Создать', ['class' => 'btn btn-primary','id'=>'submitRequest']) ?>
        </div>
    </div>

    <?php \yii\widgets\ActiveForm::end() ?>
    </div>
