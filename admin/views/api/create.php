<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model admin\models\ApplicationApi */

$this->title = 'Tambah Application Api';
$this->params['breadcrumbs'][] = ['label' => 'Application Api', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="application-api-create">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->render('_form', [
                            'model' => $model,
                            ]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
