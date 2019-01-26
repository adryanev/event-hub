<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EventStatus */

$this->title = 'Tambah Event Status';
$this->params['breadcrumbs'][] = ['label' => 'Event Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-status-create">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->render('_form', [
                            'model' => $model,
                            ]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
