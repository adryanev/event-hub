<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\alert\Alert;

/* @var $this yii\web\View */
/* @var $model organizer\models\OrganizerVerificationForm */
/* @var $form ActiveForm */
?>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="m-t-10 card-box">
                    <div class="panel-body">
                        <?php echo Alert::widget(['useSessionFlash'=>true])?>
                        <div class="organizer-verification">
                            <h4 class="page-title">Organizer Verification</h4>

                            <div class="row">
                                <!-- BASIC WIZARD -->
                                <div class="col-lg-12">
                                    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
                                    <div id="basicwizard" class=" pull-in">
                                        <ul>
                                            <li><a href="#tab1" data-toggle="tab">Account</a></li>
                                            <li><a href="#tab2" data-toggle="tab">Address</a></li>
                                            <li><a href="#tab3" data-toggle="tab">Upload</a></li>
                                            <li><a href="#tab4" data-toggle="tab">Finish</a></li>
                                        </ul>
                                        <div class="tab-content b-0 m-b-0">
                                            <div class="tab-pane m-t-10 fade" id="tab1">
                                                <?=$form->field($model,'name')->textInput(['value'=>Yii::$app->user->identity->name, 'readonly'=>true])?>
                                                <?=$form->field($model,'email')->textInput(['value'=>Yii::$app->user->identity->email, 'readonly'=>true])?>
                                                <?=$form->field($model,'organization_type')->widget(\kartik\select2\Select2::class,[
                                                        'data'=>$dataType
                                                ])?>
                                                <?=$form->field($model,'description')->widget(\yii\redactor\widgets\Redactor::className())?>
                                                <?= $form->field($model,'work_phone')->textInput() ?>
                                                <?= $form->field($model,'cell_phone')->textInput() ?>
                                                <?= $form->field($model,'twitter')->textInput() ?>
                                                <?= $form->field($model,'instagram')->textInput() ?>
                                                <?= $form->field($model,'facebook')->textInput() ?>
                                                <?= $form->field($model,'whatsapp')->textInput() ?>
                                                <?= $form->field($model,'website')->textInput() ?>
                                                <?=$form->field($model,'bank_name')->widget(\kartik\select2\Select2::class,[
                                                    'data'=>$dataBank
                                                ])?>
                                                <?= $form->field($model,'bank_account')->textInput() ?>



                                            </div>
                                            <div class="tab-pane m-t-10 fade" id="tab2">
                                                <?= $form->field($model,'address_1')->textInput() ?>
                                                <?= $form->field($model,'address_2')->textInput() ?>
                                                <?= $form->field($model,'city')->textInput() ?>
                                                <?= $form->field($model,'province')->textInput() ?>
                                                <?= $form->field($model,'country')->textInput() ?>
                                                <?= $form->field($model,'postal_code')->textInput() ?>
                                                <?= $form->field($model,'coordinate')->widget(\msvdev\widgets\mappicker\MapInput::class,[
                                                    'service'=>'google',
                                                    'apiKey'=>$mapsApi,
                                                    'mapZoom'=>12,
                                                    'mapCenter'=>[0.511907, 101.448639]
                                                ]) ?>


                                            </div>
                                            <div class="tab-pane m-t-10 fade" id="tab3">
                                               <?= $form->field($model,'profile_picture')->widget(\kartik\file\FileInput::class,[
                                                   'options' => ['accept' => 'image/*'],
                                               ])?>
                                               <?= $form->field($model2,'verificationFiles[]')->widget(\kartik\file\FileInput::class,[
                                                    'options'=>['multiple'=>true]
                                               ])?>
                                            </div>
                                            <div class="tab-pane m-t-10 fade" id="tab4">

                                                <?=$form->field($model,'terms')->checkbox(['label'=>"I agree with the ". Html::a('Terms and Conditions',\yii\helpers\Url::to(['site/terms-of-service'],['target' => '_blank']))."."])?>
                                            </div>
                                            <ul class="pager wizard m-b-0">
                                                <li class="previous"><a href="#" class="btn btn-primary waves-effect waves-light">Previous</a>
                                                </li>
                                                <li class="next"><a href="#" class="btn btn-primary waves-effect waves-light">Next</a></li>
                                                <li class="finish"><?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <?php ActiveForm::end(); ?>

                                </div>
                                <!-- end col -->
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end wrapper page -->

<script>
    var resizefunc = [];
</script>
<!-- organizer-verification -->
<?php
$js = <<<JS
    $(document).ready(function() {
      $('#basicwizard').bootstrapWizard({'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted'
      , onLast: function() {
        
      }});
    });
JS;

$this->registerJs($js);
