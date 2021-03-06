<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage();
    $user = \admin\models\User::findOne(["username"=>Yii::$app->user->identity->username])
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="body">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
 if (!Yii::$app->user->isGuest) {
        NavBar::begin([
            'brandLabel' => Html::img('https://almaty.hh.kz/employer-logo/2906961.png'),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'headerLogo',
            ],
        ]);
        $menuItems[] = '<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        '.Html::img('/assets/images/'.$user->image,['class'=>'img-circle header-logo user-image']).'
                    </a>
                    <span class="hidden-xs dropdown-toggle">'.Yii::$app->user->identity->username.'</span>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">'
                               .Html::img('/assets/images/'.$user->image,['class'=>'img-circle header-logo']).'
                            <p>'.Yii::$app->user->identity->username.'
                                <small>'.date("d/m/Y").'</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">'.
                                 Html::a(
                                    "Выход",
                                    ["/site/logout"],
                                    ["data-method" => "post", "class" => "btn btn-default btn-flat logout"]
                                ) .'
                            </div>
                            <div class="pull-left">
                                <a href="'.\yii\helpers\Url::to(['profile/show','id'=>$user->id]).'" class="btn btn-default btn-flat showProfile">
                                Профиль
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>';
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
    }


    ?>

    <?php
    if (!Yii::$app->user->isGuest){ ?>
    <div class="categories">
    <?php
    $categories = \admin\models\Categories::find()->all();
            foreach ($categories as $category) {
                echo
                    "<div class='categories-items'><h1>"
                    . Html::a($category->title, ['site/index', 'data' => $category->id], ['class' => 'categoriesHref']) .
                    "</h1></div>";
            }
    echo
        "<div class='categories-items'><h1>"
        . Html::a('Сотрудники', ['profile/employers'], ['class' => 'categoriesHref']) .
        "</h1></div>";
    echo
        "<div class='categories-items'><h1>"
        . Html::a('Заявки', ['requests/index'], ['class' => 'categoriesHref']) .
        "</h1></div>";
    ?>
    </div>
    <?php } ?>
    <?= $content ?>
</div>

<?php

\yii\bootstrap\Modal::begin([
        'id' => 'profile'
]);
\yii\bootstrap\Modal::end();
?>
<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; --><?//= Html::encode(Yii::$app->name) ?><!-- --><?//= date('Y') ?><!--</p>-->
<!---->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
