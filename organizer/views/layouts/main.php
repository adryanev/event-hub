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
<?= \common\widgets\PusherWidget::widget(['events' => [
    'notification'],
    'system'=>['organizer']]) ?>

<?=$this->render('header')?>
<?=$this->render('content',['content'=>$content])?>
<?=$this->render('footer')?>
<?=$this->render('right-sidebar')?>

<?php $this->endBody() ?>

<script type="text/javascript">

    function showNotification(data) {
        const notification = document.getElementById('notif-list');

        lowLag.init();
        const notifSound = '<?= Yii::getAlias('@web/sounds/dont-think-so.ogg')?>';
        const url = 'http://admin.event-hub.com/verifikasi-organizer/';
        lowLag.load(notifSound);

        lowLag.play(notifSound);
        console.log(data);
        let html = "<li class=\"list-group-item\">\n" +
            "                    <a href=\""+url+"\" class=\"user-list-item\">\n" +
            "                        <div class=\"icon bg-info\">\n" +
            "                            <i class=\"zmdi zmdi-comment\"></i>\n" +
            "                        </div>\n" +
            "                        <div class=\"user-desc\">\n" +
            "                            <span class=\"name\">"+data.from+"</span>\n" +
            "                            <span class=\"desc\">"+data.message+"</span>\n" +
            "                            <span class=\"time\">"+data.time+"</span>\n" +
            "                        </div>\n" +
            "                    </a>\n" +
            "                </li>";
        notification.insertAdjacentHTML('afterbegin',html)

        let counter = -1;
        let toastCounter = 0;
        let lastToast;

        const notifType = 'info';
        const message = data.message;
        const title= data.title;

        lastToast = toastr[notifType](message, title);

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };


        function getLastToast() {
            return lastToast;

        }
        $('#clearlasttoast').click(function () {
            toastr.clear(getLastToast());
        });
        $('#cleartoasts').click(function () {
            toastr.clear();
        });
    }

</script>
</body>
</html>
<?php $this->endPage() ?>
