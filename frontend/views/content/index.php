<?php
//foreach ($content as $item) { ?>
<!--    <h1>--><? //= $item->title ?><!--</h1>-->
<!--    <p>--><? //= $item->content ?><!--</p>-->
<?php //}
//
use yii\helpers\Html; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<body>
<div class="header">
    <h2><?= $content->title ?></h2>
</div>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
<!--            <h5>--><?//= $content->short_description ?><!--</h5>-->
            <p><?= $content->content ?></p>
        </div>
    </div>
</div>

<div class="comments">
    <?php if ($commentsCnt >= 1): ?>
    <div class="comments-container">
        <h2><?php echo 'Комментарии: ' . $commentsCnt; ?> </h2>
    <?php
    foreach ($comments as $item) { ?>
        <?php if (Yii::$app->user->identity->username != $item->user && $role != 'admin'){ ?>
        <ul id="comments-list" class="comments-list">
            <li>
                <div class="comment-main-level">
                    <div class="comment-avatar">
                        <?php $user = \admin\models\User::findOne(['username'=>$item->user]) ?>
                        <?= Html::img('/assets/images/'.$user->image) ?>
                    </div>
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name by-author"><a
                                        href="<?= \yii\helpers\Url::to(['profile/show','id'=>$user->id]) ?>"><?= $item->user ?></a></h6>
                            <h4><?= $item->title ?></h4>
                            <span><?= $item->created_at ?></span>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content">
                            <?= $item->comment ?>
                        </div>
                    </div>
                </div>
                <?php } if (Yii::$app->user->identity->username == $item->user || $role == 'admin') { ?>
                <ul id="comments-list" class="comments-list">
                    <li>
                        <div class="comment-main-level">
                            <div class="comment-avatar">
                                <? $user = \admin\models\User::findOne(['username'=>$item->user]) ?>
                                <?= Html::img('/assets/images/'.$user->image)?>
                            </div>
                            <div class="comment-box">
                                <div class="comment-head">
                                    <div class="icons">
                                        <? if ($item->title!='Коментарий был удален'): ?>
                                        <?= Html::button('', ['class'=>'glyphicon glyphicon-edit','id'=>'editBtn','onclick'=>'edit('.$item->id.')']) ?>
                                        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['content/delete', 'id'=>$item->id],['class'=>'btn btn-submit']) ?>
                                        <? endif; ?>
                                        <? if ($item->title=='Коментарий был удален' && $role == 'admin'):
                                        echo Html::a('<i class="glyphicon glyphicon-trash"></i>', ['content/delete', 'id' => $item->id], ['class' => 'btn btn-submit']);
                                        endif ?>
                                    </div>
                                    <h6 class="comment-name by-author"><a
                                                href="<?= \yii\helpers\Url::to(['profile/show','id'=>$user->id]) ?>" class="showProfile"><?= $item->user ?></a></h6>
                                    <h4 class=<?=$item->id?>><?= $item->title ?></h4>
                                    <span><?= $item->created_at ?></span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content">
                                    <p class="comment<?=$item->id?>"><?= $item->comment ?></p>
                                </div>
                            </div>
                        </div>
                            <?  }
    } ?>
                        <? endif; ?>
                </div>
                <div class="add-comment-form">
                    <?php
                    $form = \yii\widgets\ActiveForm::begin();
                    echo $form->field($model, 'title');
                    echo $form->field($model, 'comment');
                    ?>
                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php \yii\widgets\ActiveForm::end();
                    ?>
                </div>

</body>