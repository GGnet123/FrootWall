
    <?php foreach ($categories as $category): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $category->title ?></th>
            </tr>
        </thead>
        <tr>
            <th scope="col">
                #
            </th>
            <th scope="col">
                Логин
            </th>
            <th scope="col">
                Имя/Фамилия
            </th>
            <th scope="col">
                email
            </th>
            <th scope="col">
                Должность
            </th>
            <th scope="col">
                Дата прихода в компанию
            </th>
        </tr>
        <?php $count = 1 ?>
        <? foreach ($category->users as $user): ?>
        <tr>
            <th>
                <?= $count ?>
            </th>
            <td>
                <a href="<?= \yii\helpers\Url::to(['profile/show','id'=>$user->id]) ?>" class="showProfile"><?= $user->username ?></a>
            </td>
            <td>
                <?= $user->full_name ?>
            </td>
            <td>
                <?= $user->email ?>
            </td>
            <td>
                <?= $user->job ?>
            </td>
            <td>
                <?= $user->come_date ?>
            </td>
        </tr>
        <?php $count++ ?>
            <? endforeach; ?>
    </table>
    <? endforeach; ?>

