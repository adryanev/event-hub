<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/26/2019
 * Time: 1:45 AM
 */

?>


<!-- Right Sidebar -->
<div class="side-bar right-bar">

    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="zmdi zmdi-close-circle-o"></i>
    </a>
    <h4 class="">Notifications</h4>
    <?= \yii\helpers\Html::a('<h6>Lihat semua notifikasi</h6>',\yii\helpers\Url::to(['notification/index']))?>



    <div class="notification-list nicescroll">
        <ul class="list-group list-no-border user-list" id="notif-list">

            <?php
            $notifs = \admin\models\NotificationAdmin::find()->where(['isDeleted' => 0])->orderBy('created_at desc')->limit(10)->all();

            foreach ($notifs as $item):
                if($item->event === 'organizer-verification-event'):
               ?>

                <li class="list-group-item">
                    <a href="<?=\yii\helpers\Url::to(['verifikasi-organizer/index'])?>" class="user-list-item">
                        <div class="icon bg-info">
                            <i class="zmdi zmdi-comment"></i>
                        </div>
                        <div class="user-desc">
                            <span class="name"><?=$item->from?></span>
                            <span class="desc"><?= $item->messages?></span>
                            <span class="time"><?= \Carbon\Carbon::createFromTimestamp($item->created_at)->diffForHumans()?></span>
                        </div>
                    </a>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!-- /Right-bar -->

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>