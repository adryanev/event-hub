<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model organizer\models\CreateEventForm */
/* @var $form ActiveForm */

$this->title= 'Buat Event';
?>
<div class="create-event">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                    <div class="row">
                        <div class="col-md-12">

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'title') ?>
                            <?= $form->field($model, 'isOffline') ?>
                            <?= $form->field($model, 'venueName') ?>
                            <?= $form->field($model, 'address1') ?>
                            <?= $form->field($model, 'country') ?>
                            <?= $form->field($model, 'province') ?>
                            <?= $form->field($model, 'city') ?>
                            <?= $form->field($model, 'coordinate')->widget(\msvdev\widgets\mappicker\MapInput::class,[
                                'service' => 'google',
                                'apiKey' => Yii::$app->params['keys']['google_maps_browser_key2'],
                                'mapZoom' => 12,
                                'mapCenter' => [0.511907, 101.448639]
                            ]) ?>
                            <?= $form->field($model, 'dateRange') ?>
                            <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::class) ?>
                            <?= $form->field($model, 'publishingType') ?>
                            <?= $form->field($model, 'type') ?>
                            <?= $form->field($model, 'topic') ?>
                            <?= $form->field($model, 'showRemaining') ?>
                            <?= $form->field($model, 'userOrganizer') ?>
                            <?= $form->field($model, 'address2') ?>
                            <?= $form->field($model, 'eventPoster') ?>
                            <?= $form->field($model, 'instagramLink') ?>
                            <?= $form->field($model, 'facebookLink') ?>
                            <?= $form->field($model, 'twitterLink') ?>
                            <?= $form->field($model, 'eventStatus') ?>

                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div><!-- create-event -->
