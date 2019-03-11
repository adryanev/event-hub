<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Type */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Organizer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-view">

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center">
                                <?=Html::img(Yii::getAlias('@organizerImage/avatar/'.$model->profile_picture),['class'=>'mx-auto d-block', 'height'=>200, 'width'=>200])?>
                                <h4 class="m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                                <p>Description:</p><?=\yii\helpers\HtmlPurifier::process($model->description)?>
                            </div>


                            <?=$map->display()?>
                        </div>
                        <div class="col-md-6">

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'email:email',
//                                    'password_hash',
                                    'name',
                                    'organization.name',
                                    'address_1',
                                    'address_2',
                                    'country',
                                    'province',
                                    'city',
                                    'postal_code',
                                    'latitude',
                                    'longitude',

                                    'work_phone',
                                    'cell_phone',
                                    'description',
                                    'twitter',
                                    'instagram',
                                    'facebook',
                                    'whatsapp',
                                    'website',
                                    'bank.name',
                                    'bank_account',
                                    'isDeleted:boolean',
                                    'created_at:datetime',
                                    'updated_at:datetime',
                                    'auth_key',
                                    'access_token',
                                    'isVerified:boolean',
                                    'verification_status',
                                ],
                            ]) ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Verification File</h4>
                <p>
                    <?= Html::a('<span><i class="zmdi zmdi-check"></i> </span>Setujui', ['approve', 'id' => $model->id], ['class' => 'btn btn-success waves-effect waves-light', 'data' => [
                        'confirm' => 'Anda yakin untuk Menerima permintaan ini?',
                        'method'=>'POST'
                    ],]) ?>
                    <?= Html::a('<span><i class="zmdi zmdi-delete"></i> </span>Tolak', ['reject', 'id' => $model->id], [
                        'class' => 'btn btn-danger waves-effect waves-light',
                        'data' => [
                            'confirm' => 'Anda yakin untuk menolak permintaan ini?',
                            'method'=>'POST'
                        ],
                    ]) ?>
                </p>
                <div class="card-content">
                    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],

                                //'id',
                                [
                                    'attribute'=>'verification_file',
                                    'value'=>function($model){
                                        $url = Yii::getAlias('@organizerUpload/verification/'.$model->verification_file);
                                        return Html::a($model->verification_file,\yii\helpers\Url::to($url), ['target' => '_blank']);
                                    },
                                    'format'=>'raw'
                                ],

//                                'isDeleted:boolean',
//                                'created_at:datetime',
//                                'updated_at:datetime',

                            ]
                        ]

                    ); ?>
                </div>

            </div>
        </div>
    </div>

</div>
