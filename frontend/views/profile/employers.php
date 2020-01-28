<table class="table">
    <?php foreach ($categories as $category): ?>
        <tr><td><?= $category->title ?> </td></tr>
        <? foreach ($category->users as $user): ?>
            <td>
                <a href="<?= \yii\helpers\Url::to(['profile/show','id'=>$user->id]) ?>" class="showProfile"><?= $user->username ?></a>
            </td>
            <? endforeach; ?>
    <? endforeach; ?>
</table>
