<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2mod\alert\Alert;

/* @var $this yii\web\View */
/* @var $model organizer\models\OrganizerVerificationForm */
/* @var $form ActiveForm */

$this->title = "Organizer Verification"
?>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <?php if (Yii::$app->user->identity->verification_status === \common\models\StatusKonten::ORGANIZER_NOT_VERIFIED): ?>
                        <div class="alert alert-warning">
                            <p>Untuk dapat mengakses akun, data anda harus diverifikasi dahulu oleh Admin.</p>
                        </div>
                    <?php endif; ?>
                    <div class="m-t-10 card-box">
                        <div class="panel-body">
                            <?php echo Alert::widget(['useSessionFlash' => true]) ?>
                            <div class="organizer-verification">
                                <h4 class="page-title"><?= $this->title ?></h4>

                                <div class="row">
                                    <!-- BASIC WIZARD -->
                                    <div class="col-lg-12">
                                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                                        <div id="basicwizard" class=" pull-in">
                                            <ul>
                                                <li><a href="#tab1" data-toggle="tab">Account</a></li>
                                                <li><a href="#tab2" data-toggle="tab">Address</a></li>
                                                <li><a href="#tab3" data-toggle="tab">Upload</a></li>
                                                <li><a href="#tab4" data-toggle="tab">Finish</a></li>
                                            </ul>
                                            <div class="tab-content b-0 m-b-0">
                                                <div class="tab-pane m-t-10 fade" id="tab1">
                                                    <?= $form->field($model, 'name')->textInput(['value' => Yii::$app->user->identity->name, 'readonly' => true]) ?>
                                                    <?= $form->field($model, 'email')->textInput(['value' => Yii::$app->user->identity->email, 'readonly' => true]) ?>
                                                    <?= $form->field($model, 'organization_type')->widget(\kartik\select2\Select2::class, [
                                                        'data' => $dataType,
                                                        'options' => ['placeholder' => 'Pilih tipe akun anda']
                                                    ]) ?>
                                                    <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className()) ?>
                                                    <?= $form->field($model, 'work_phone')->textInput(['placeholder' => '076100000 / 081200000000']) ?>
                                                    <?= $form->field($model, 'cell_phone')->textInput(['placeholder' => '081200000000']) ?>
                                                    <?= $form->field($model, 'twitter')->textInput([
                                                        'placeholder' => 'https://twitter.com/xxxxxx'
                                                    ]) ?>
                                                    <?= $form->field($model, 'instagram')->textInput(['placeholder' => 'https://www.instagram.com/xxxxxx']) ?>
                                                    <?= $form->field($model, 'facebook')->textInput(['placeholder' => 'https://web.facebook.com/xxxxxx']) ?>
                                                    <?= $form->field($model, 'whatsapp')->textInput(['placeholder' => '081200000000']) ?>
                                                    <?= $form->field($model, 'website')->textInput(['placeholder' => 'https://www.example.com']) ?>
                                                    <?= $form->field($model, 'bank_name')->widget(\kartik\select2\Select2::class, [
                                                        'data' => $dataBank
                                                    ]) ?>
                                                    <?= $form->field($model, 'bank_account')->textInput() ?>


                                                </div>
                                                <div class="tab-pane m-t-10 fade" id="tab2">
                                                    <?= $form->field($model, 'coordinate')->widget(\msvdev\widgets\mappicker\MapInput::class, [
                                                        'service' => 'google',
                                                        'apiKey' => Yii::$app->params['keys']['google_maps_browser_key2'],
                                                        'mapZoom' => 12,
                                                        'mapCenter' => [0.511907, 101.448639],

                                                    ]) ?>
                                                    <?= $form->field($model, 'address_1')->textInput() ?>
                                                    <?= $form->field($model, 'address_2')->textInput() ?>
                                                    <?= $form->field($model, 'city')->textInput() ?>
                                                    <?= $form->field($model, 'province')->textInput() ?>
                                                    <?= $form->field($model, 'country')->textInput() ?>
                                                    <?= $form->field($model, 'postal_code')->textInput() ?>


                                                </div>
                                                <div class="tab-pane m-t-10 fade" id="tab3">
                                                    <?= $form->field($model, 'profile_picture')->widget(\kartik\file\FileInput::class, [
                                                        'options' => ['accept' => 'image/*'],
                                                    ]) ?>
                                                    <?= $form->field($model2, 'verificationFiles[]')->widget(\kartik\file\FileInput::class, [
                                                        'options' => ['multiple' => true, 'accept' => 'image/*']
                                                    ])->label('Verification Files (KTP/Surat Izin/SK)') ?>
                                                </div>
                                                <div class="tab-pane m-t-10 fade" id="tab4">

                                                    <?= $form->field($model, 'terms')->checkbox(['label' => "I agree with the " . Html::a('Terms and Conditions', \yii\helpers\Url::to(['site/terms-of-service'], ['target' => '_blank'])) . "."]) ?>
                                                </div>
                                                <ul class="pager wizard m-b-0">
                                                    <li class="previous"><a href="#"
                                                                            class="btn btn-primary waves-effect waves-light">Previous</a>
                                                    </li>
                                                    <li class="next"><a href="#"
                                                                        class="btn btn-primary waves-effect waves-light">Next</a>
                                                    </li>
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
      
      MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

var trackChange = function(element) {
  var observer = new MutationObserver(function(mutations, observer) {
    if(mutations[0].attributeName == "value") {
        $(element).trigger("change");
    }
  });
  observer.observe(element, {
    attributes: true
  });
}
      trackChange( $("#map2-coordinate")[0] );

      $('#map2-coordinate').change(function() {
        var a = document.getElementById('map2-coordinate').value;
        var b = a.split('@');
        var latLng = {
            lat: b[0],
            lng: b[1]
        };
        var geocoder = new google.maps.Geocoder;
        geocodeLatLng(geocoder, latLng)
      });
        
      function geocodeLatLng(geocoder, latLng){
                    console.log(latLng);

          var location = {lat: parseFloat(latLng.lat), lng: parseFloat(latLng.lng)};
          geocoder.geocode({'location': location }, function(result, status) {
            if(status === 'OK'){
                if(result[0]){
                    var addrObject = result[0].address_components;
                    console.log(addrObject);
                    
                     var address = {};

                     for(let i = 0; i< addrObject.length; i++){
                         let component = addrObject[i];
                         switch (component.types[0]) {
                        case 'postal_code':
                             address.postalCode = component.long_name; break;
                        case 'administrative_area_level_2':
                            address.city = component.long_name; break;
                        case 'country':
                            address.country = component.long_name;
                            break;
                        case 'route':
                             address.route = component.long_name; break;
                          case 'street_number':
                             address.streetNumber = component.long_name; break;    
                        case 'administrative_area_level_4':
                             address.lvl4 = component.long_name; break;       
                         case 'administrative_area_level_3':
                             address.lvl3 = component.long_name; break    
                             
                             case 'administrative_area_level_1':
                             address.lvl1 = component.long_name; break
                    }
                     }
                    
                                        console.log(address);

                    $('#organizerverificationform-city').val(address.city);
                    $('#organizerverificationform-province').val(address.lvl1);
                    $('#organizerverificationform-country').val(address.country);
                    $('#organizerverificationform-postal_code').val(address.postalCode);
                    
                    
                }
            }
          })
      }
        

    });

  

JS;

$this->registerJs($js);
