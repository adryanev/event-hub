<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\models\ApplicationApi */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Application Api', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-api-view">

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary waves-effect waves-light']) ?>
                                <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger waves-effect waves-light',
                                    'data' => [
                                        'confirm' => 'Anda yakin untuk menghapus item ini?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'name',
                                    'description',
                                    'token',
                                    'created_at:datetime',
                                    'updated_at:datetime',
                                    'isDeleted:boolean',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
