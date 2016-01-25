<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Windmill ',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    //['label' => 'Home', 'url' => ['/site/index']],
            		['label' => 'Jobs', 'url' => ['/job/index']],
                    ['label' => 'History', 'url' => ['/history/index']],
//                     ['label' => 'Top10', 'url' => ['/top/count']],
//                     ['label' => 'Failure', 'url' => ['/failure/index']],
//             		['label' => 'Alert', 'url' => ['/alerts/index']],
                    ['label' => 'Help', 'url' => ['/site/about']],
                    //  ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
            		// ['label'=> 'xout', 'url' => ['/site/logoutx']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container" id='bc'>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= date('Y') ?></p>
            <p class="pull-right">，&nbsp;etc.</p>
            <p class="pull-right">，&nbsp;<a href="http://zookeeper.apache.org/" target='_blank' rel="external">Zookeeper</a></p>
            <p class="pull-right">，&nbsp;<a href="http://python.org/" target='_blank' rel="external">Python</a></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
