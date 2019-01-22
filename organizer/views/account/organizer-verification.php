<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\alert\Alert;
\organizer\assets\JqueryStepsAsset::register($this);
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
                                    <div id="example-basic">
                                        <h3>Keyboard</h3>
                                        <section>
                                            <p>Try the keyboard navigation by clicking arrow left or right!</p>
                                        </section>
                                        <h3>Effects</h3>
                                        <section>
                                            <p>Wonderful transition effects.</p>
                                        </section>
                                        <h3>Pager</h3>
                                        <section>
                                            <p>The next and previous buttons help you to navigate through your content.</p>
                                        </section>
                                    </div>
                                    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>





                                    <div class="form-group">
                                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
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

    $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true
    });
JS;


$this->registerJs($js);
