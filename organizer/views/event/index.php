<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 2/18/2019
 * Time: 3:08 PM
 */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Event Saya'
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="card-content">
                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                <div class="row">
                    <div class="col-md-12">
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <p>
                            <?= Html::a('Buat Event', ['create'], ['class' => 'btn btn-success waves-effect waves-light']) ?>
                        </p>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

