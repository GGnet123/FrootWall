
<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
    </div>
<?php else: ?>
    <?php $this->renderPartial('/comment/_form',array(
        'model'=>$comment,
    )); ?>
<?php endif; ?>