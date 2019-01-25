<?php

/* @var $this \yii\web\View */

/* @var $content string */

use admin\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;


AppAsset::register($this);
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
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        const pusher = new Pusher('<?=Yii::$app->params['keys']['pusher_key']?>', {
            cluster: '<?=Yii::$app->params['keys']['pusher_cluster']?>',
            forceTLS: true
        });

    </script>
</head>
<body class="fixed-left widescreen">
<?php $this->beginBody() ?>
<?= $this->render('header') ?>
<?= $this->render('sidebar') ?>
<?= $this->render('content', ['content' => $content]) ?>
<?= $this->render('footer') ?>



<?php $this->endBody() ?>
<script type="text/javascript">
    lowLag.init();
    const notifSound = '<?= Yii::getAlias('@web/sounds/dont-think-so.ogg')?>';
    lowLag.load(notifSound);

    const channel = pusher.subscribe('admin-channel');
    channel.bind('organizer-verification-event', function (data) {
        lowLag.play(notifSound);

        let counter = -1;
        let toastCounter = 0;
        let lastToast;

        const notifType = 'info';
        const message = 'Organizer '+data.organizer+', '+data.message;
        const title= 'Verifikasi Organizer';

        let toast = toastr[notifType](message,title);
        lastToast = toast;

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
        }

        function getLastToast() {
            return lastToast;

        }
        $('#clearlasttoast').click(function () {
            toastr.clear(getLastToast());
        });
        $('#cleartoasts').click(function () {
            toastr.clear();
        });
    });

</script>
</body>
</html>
<?php $this->endPage() ?>
