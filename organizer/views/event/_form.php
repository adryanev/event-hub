<?php

use kartik\select2\Select2;
use adryanev\dynamicform\DynamicFormWidget;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 13/03/19
 * Time: 13:17
 */
?>

<div class="event-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => ['multipart/form-data']], 'id'=>'dynamic-form']); ?>
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
                                    <?= $form->field($model, 'title')->textInput(['placeholder'=>'Judul Event']) ?>
                                    <?= $form->field($model, 'isOffline')->dropDownList([0=>'Tidak',1=>'Ya'],['prompt'=>'Pilih'])->label('Event Offline?') ?>
                                    <?= $form->field($model, 'dateRange')->widget(\kartik\daterange\DateRangePicker::class,[
                                            'convertFormat'=>true,
                                            'pluginOptions'=>[
                                                    'timePicker'=>true,
                                                     'locale'=>['format'=>'Y-m-d h:i:s']
                                            ]
                                    ])->label('Waktu Event') ?>
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
                                    <?= $form->field($model, 'city') ?>
                                    <?= $form->field($model, 'province') ?>
                                    <?= $form->field($model, 'country') ?>

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

                            <?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-items', // required: css class selector
                                'widgetItem' => '.item', // required: css class
                                'limit' =>20, // the maximum times, an element can be added (default 999)
                                'min' => 1, // 0 or 1 (default 1)
                                'insertButton' => '.add-item', // css class
                                'deleteButton' => '.remove-item', // css class
                                'model' => $modelsTicket[0],
                                'formId' => 'dynamic-form',
                                'formFields' => [
                                    'ticket_name',
                                    'quantity',
                                    'price',
                                ],
                            ]); ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>
                                        <i class="glyphicon glyphicon-envelope"></i> Tiket
                                        <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="container-items"><!-- widgetBody -->
                                        <?php foreach ($modelsTicket as $i => $modelTicket): ?>
                                            <div class="item panel panel-default"><!-- widgetItem -->
                                                <div class="panel-heading">
                                                    <h3 class="panel-title pull-left">Tiket</h3>
                                                    <div class="pull-right">
                                                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="panel-body">
                                                    <?php
                                                    // necessary for update action.
                                                    if (! $modelTicket->isNewRecord) {
                                                        echo Html::activeHiddenInput($modelTicket, "[{$i}]id");
                                                    }
                                                    ?>
                                                    <?= $form->field($modelTicket, "[{$i}]ticket_name")->textInput(['maxlength' => true]) ?>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <?= $form->field($modelTicket, "[{$i}]quantity")->textInput(['maxlength' => true]) ?>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <?= $form->field($modelTicket, "[{$i}]price")->textInput(['maxlength' => true]) ?>
                                                        </div>
                                                    </div><!-- .row -->
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div><!-- .panel -->
                            <?php DynamicFormWidget::end(); ?>



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
</div>

<?php
$js = <<<JS



    $(document).ready(function() {
      
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
      trackChange( $("#map0-coordinate")[0] );

      $('#map0-coordinate').change(function() {
        var a = document.getElementById('map0-coordinate').value;
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

                    $('#createeventform-city').val(address.city);
                    $('#createeventform-province').val(address.lvl1);
                    $('#createeventform-country').val(address.country);
                    
                    
                }
            }
          })
      }
        

    });

  

JS;

$this->registerJs($js);
