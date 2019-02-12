<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 2/12/2019
 * Time: 5:03 PM
 */


use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Notification';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="card-content">
                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped m-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>From</th>
                                <th>Messages</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                       <?php
                       $counter = 0;
                       foreach ($notifications as $notification):



                           $messages = \yii\helpers\Json::decode($notification->messages);
                       ?>

                               <tr>
                                   <th scope="row"><?= ++$counter?></th>
                                   <td><?=$messages['organizer']?></td>
                                   <td><?=$messages['message']?></td>
                                   <td><?=\Carbon\Carbon::createFromTimestamp($notification->created_at)->diffForHumans()?></td>
                               </tr>




                        <?php
                       endforeach;?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

