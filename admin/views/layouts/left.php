<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (Yii::$app->user->id == 27) { ?>
                    <img src="https://i.pinimg.com/originals/34/ee/fe/34eefe7515f0741eec31f44bd68096e2.png"
                         class="img-circle" alt="User Image"/>
                <?php } else { ?>
                    <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                <?php } ?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php
        $user = \admin\models\User::findOne(['username'=>Yii::$app->user->identity->username]);
        if ($user->role=='admin'){ ?>
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        [
                            'label' => 'Категории',
                            'url' => ['/categories/index'],
                            'icon' => 'list',
                        ],
                        [
                            'label' => 'Articles',
                            'url' => ['/articles/index'],
                            'icon' => 'list'
                        ],
                        [
                            'label' => 'Registration',
                            'url' => ['/user/index'],
                            'icon' => 'list'
                        ],
                    ],
                ]
            ) ?>
        <?php } else {
            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Категории',
                            'url' => ['/categories/index'],
                            'icon' => 'list',
                        ],
                        [
                            'label' => 'Articles',
                            'url' => ['/articles/index'],
                            'icon' => 'list'
                        ],
                        [
                            'label' => 'Registration',
                            'url' => ['/user/index'],
                            'icon' => 'list'
                        ],
                    ],
                ]
            );
        }?>
    </section>

</aside>
