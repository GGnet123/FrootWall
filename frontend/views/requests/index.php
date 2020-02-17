<?php

use yii\widgets\LinkPager;

?>
<div class="container-fluid">
    <div>
        <?= \yii\helpers\Html::button('Создать запрос',['class'=>'btn btn-success create-request-btn','onclick'=>'location.href="index.php?r=requests/create"']); ?>
    </div>
    <div>
        <?php foreach ($requests as $request): ?>
        <div style="border: black 1px solid; padding: 10px">
            <?php $isAcceptable = false; ?>
            <?php $showDocs = false; ?>
            <?php foreach ($request->category as $category): ?>
                <?php foreach ($request->fromUser as $user): ?>
                    <?= '<p>id: '.$request->id.'</p>' ?>
                    <?= '<p>Category: '.$category->title.'</p>' ?>
                    <a href="<?= \yii\helpers\Url::to(['profile/show','id'=>$user->id]) ?>" class="showProfile"><?= $user->full_name ?></a>
                    <?= '<p style="border-bottom: red 1px dotted" ">To users:</p>' ?>
                    <?php foreach ($request->toUsers as $to_user): ?>
                        <a href="<?= \yii\helpers\Url::to(['profile/show','id'=>$to_user['id']]) ?>" class="showProfile"><?= $to_user['full_name'] ?></a>
                        <?php if (in_array(Yii::$app->user->identity->id, $to_user) && $request->status == 1): ?>
                            <?php $isAcceptable = true ?>
                        <?php endif; ?>
                        <?php if (in_array(Yii::$app->user->identity->id, $to_user) && $request->status == 2): ?>
                            <?php $showDocs = true ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?= '<p style="border-top: red 1px dotted">Date: '.$request->date.'</p>' ?>
                <?= '<p>Status: '.$request->statuses[$request->status].'</p>' ?>
                <?= '<p>Created_at: '.$request->created_at.'</p>' ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <?php if ($isAcceptable): ?>
            <button id="accept" onclick="accept(<?= $request->id ?>)">Принять</button>
            <?php endif; ?>
            <?php if ($isAcceptable && $request->docs!=null || $showDocs && $request->docs!=null): ?>
                <a class="btn btn-default" href="<?=\yii\helpers\Url::to(['requests/upload-docs', 'id' => $request->id])?>">Скачать документы</a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="pages">
        <?= LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>
</div>


