
    <?php foreach ($categories as $category): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $category->title ?></th>
            </tr>
        </thead>
        <tr>
            <th scope="col">
                Username
            </th>
            <th scope="col">
                email
            </th>
            <th scope="col">
                Job
            </th>
        </tr>
        <? foreach ($category->users as $user): ?>
        <tr>
            <td>
                <a href="<?= \yii\helpers\Url::to(['profile/show','id'=>$user->id]) ?>" class="showProfile"><?= $user->username ?></a>
            </td>
            <td>
                <?= $user->email ?>
            </td>
            <td>
                <?= $user->job ?>
            </td>
        </tr>
            <? endforeach; ?>
    </table>
    <? endforeach; ?>

