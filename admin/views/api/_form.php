<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\models\ApplicationApi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-api-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-3">
            <br>
            <?=Html::button('Generate API Token',['class'=> 'btn btn-default btn-lg waves-effect waves-light','id'=>'generate_button', 'onclick'=>'(function($event){
           let textInput = document.getElementById(\'applicationapi-token\');
           var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 32; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
    console.log(text);
    textInput.value = text;
    })()'])?>

        </div>


    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success waves-effect waves-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$js = <<<JS
    function generateToken() {
       
        const randomString = Math.random().toString(36).substr(2, 32);
        console.log(randomString);
    
    }
JS;
$this->registerJs($js);

?>

