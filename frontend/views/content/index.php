<?php
//foreach ($content as $item) { ?>
<!--    <h1>--><? //= $item->title ?><!--</h1>-->
<!--    <p>--><? //= $item->content ?><!--</p>-->
<?php //}
//
use yii\helpers\Html; ?>

<body>
<div class="header">
    <h2><?= $content->title ?></h2>
</div>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
            <h5><?= $content->short_description ?></h5>
            <p><?= $content->content ?></p>
        </div>
    </div>
</div>

<div class="comments">
    <?php if ($commentsCnt >= 1): ?>
    <div class="comments-container">
        <h1><?php echo $commentsCnt . ' comment(s)'; ?> </h1>
    <?php
    foreach ($comments as $item) { ?>
        <?php if (Yii::$app->user->identity->username != $item->user && $role != 'admin'){ ?>
        <ul id="comments-list" class="comments-list">
            <li>
                <div class="comment-main-level">
                    <div class="comment-avatar"><img
                                src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt="">
                    </div>
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name by-author"><a
                                        href="/profile/index"><?= $item->user ?></a></h6>
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
                                <img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt="">
                            </div>
                            <div class="comment-box">
                                <div class="comment-head">
                                    <div class="icons">
                                        <?= Html::button('', ['class'=>'glyphicon glyphicon-edit']) ?>
                                        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['content/delete', 'id'=>$item->id],['class'=>'btn btn-submit']) ?>
                                    </div>
                                    <h6 class="comment-name by-author"><a
                                                href="/profile/index"><?= $item->user ?></a></h6>
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
                            <?php }
                            }
                            ?>

                            <?php endif; ?>
                </div>
                <div class="add-comment-form">
                    <?php
                    $form = \yii\widgets\ActiveForm::begin();
                    echo $form->field($model, 'title');
                    echo $form->field($model, 'comment');
                    ?>
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php \yii\widgets\ActiveForm::end();
                    ?>
                </div>

</body>