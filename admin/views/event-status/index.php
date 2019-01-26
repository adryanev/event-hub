<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\EventStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event Status';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="card-content">
                <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                                                                                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                            
                            <p>
                                <?= Html::a('Tambah Event Status', ['create'], ['class' => 'btn btn-success waves-effect waves-light']) ?>
                            </p>

                                                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
        'columns' => [
                                ['class' => 'yii\grid\SerialColumn','header'=>'No'],

                                            'id',
            'name',
            'isDeleted',
            'created_at',
            'updated_at',

                                ['class' => 'yii\grid\ActionColumn','header'=>'Aksi'],
                                ],
                                ]); ?>
                                                        

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
