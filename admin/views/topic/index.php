<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\TopicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Topic';
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
                            <?= Html::a('Tambah Topic', ['create'], ['class' => 'btn btn-success waves-effect waves-light']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],

                                //'id',
                                'topic_name',
                                //'created_at:date',
                               // 'updated_at:date',
                               // 'isDeleted',

                                ['class' => 'yii\grid\ActionColumn', 'header' => 'Aksi'],
                            ],
                        ]); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
