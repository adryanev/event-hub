<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-content">
                    <h4 class="header-title m-t-0 m-b-30"><?= "<?= " ?>Html::encode($this->title) ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary waves-effect waves-light']) ?>
                                <?= "<?= " ?>Html::a(<?= $generator->generateString('Hapus') ?>, ['delete', <?= $urlParams ?>], [
                                'class' => 'btn btn-danger waves-effect waves-light',
                                'data' => [
                                'confirm' => <?= $generator->generateString('Anda yakin untuk menghapus item ini?') ?>,
                                'method' => 'post',
                                ],
                                ]) ?>
                            </p>

                            <?= "<?= " ?>DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                            <?php
                            if (($tableSchema = $generator->getTableSchema()) === false) {
                                foreach ($generator->getColumnNames() as $name) {
                                    echo "            '" . $name . "',\n";
                                }
                            } else {
                                foreach ($generator->getTableSchema()->columns as $column) {
                                    $format = $generator->generateColumnFormat($column);
                                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                                }
                            }
                            ?>
                            ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
