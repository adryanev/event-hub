<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EventStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success waves-effect waves-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
