<?php

/* @var $this \yii\web\View */
/* @var $content string */

use organizer\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->registerJsFile('@web/js/modernizr.min.js',['position'=>\yii\web\View::POS_HEAD]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?=$this->render('header')?>
<?=$this->render('content',['content'=>$content])?>
<?=$this->render('footer')?>
<?=$this->render('right-sidebar')?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
