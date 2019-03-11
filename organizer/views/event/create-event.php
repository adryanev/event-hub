<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model organizer\models\CreateEventForm */
/* @var $form ActiveForm */

$this->title = 'Buat Event';
?>
<div class="create-event">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => ['multipart/form-data']]]); ?>
    <h4 class="page-title"><?= Html::encode($this->title) ?></h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30">Data Event</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'title') ?>
                                    <?= $form->field($model, 'isOffline')->dropDownList([0=>'Tidak',1=>'Ya'],['prompt'=>'Pilih'])->label('Event Offline?') ?>
                                    <?= $form->field($model, 'dateRange') ?>
                                    <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::class) ?>
                                    <?= $form->field($model, 'publishingType') ?>
                                    <?= $form->field($model, 'type')->widget(\kartik\select2\Select2::class, [
                                        'data' => $dataType,
                                        'options' => ['placeholder' => 'Pilih Tipe Event']
                                    ]) ?>
                                </div>

                                <div class="col-md-6">
                                    <?= $form->field($model, 'topic')->widget(Select2::class, [
                                        'data' => $dataTopic,
                                        'options' => [
                                            'placeholder' => 'Pilih Topic Event'
                                        ]

                                    ]) ?>
                                    <?= $form->field($model, 'showRemaining')->radioList(['0' => 'Tidak', '1' => 'Ya']) ?>
                                    <?= $form->field($model, 'dateRange') ?>

                                    <?= $form->field($model, 'eventPoster')->widget(\kartik\file\FileInput::class, [
                                        'pluginOptions' => [

                                            'showUpload' => false
                                        ]
                                    ]) ?>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30">Lokasi Event</h4>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'coordinate')->widget(\msvdev\widgets\mappicker\MapInput::class, [
                                        'service' => 'google',
                                        'apiKey' => Yii::$app->params['keys']['google_maps_browser_key2'],
                                        'mapZoom' => 12,
                                        'mapCenter' => [0.511907, 101.448639]
                                    ]) ?>
                                </div>

                                <div class="col-md-6">
                                    <?= $form->field($model, 'address1') ?>
                                    <?= $form->field($model, 'address2') ?>
                                    <?= $form->field($model, 'country') ?>
                                    <?= $form->field($model, 'province') ?>
                                    <?= $form->field($model, 'city') ?>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30">Ticketing</h4>
                    <div class="row">
                        <div class="col-md-12">




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30">Sosial Media</h4>
                    <div class="row">
                        <div class="col-md-12">

                            <?= $form->field($model, 'instagramLink') ?>
                            <?= $form->field($model, 'facebookLink') ?>
                            <?= $form->field($model, 'twitterLink') ?>
                            <?= $form->field($model, 'eventStatus') ?>

                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</div><!-- create-event -->
