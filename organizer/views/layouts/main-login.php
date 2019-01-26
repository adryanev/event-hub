<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/14/2019
 * Time: 6:35 PM
 */

use organizer\assets\AppAsset;
use yii\helpers\Html;
use yii2mod\alert\Alert;

AppAsset::register($this);
$this->registerJsFile('@web/js/modernizr.min.js',['position'=>\yii\web\View::POS_HEAD]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head();
    ?>

</head>
<body>
<?php $this->beginBody() ?>
<?php echo Alert::widget(['useSessionFlash'=>true])?>


<?= $content ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
