<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title"><?= "<?= " ?>Html::encode($this->title) ?></h4>

                    <div class="row">
                        <div class="col-md-12">
                            <?= "<?php " ?>$form = ActiveForm::begin([
                            'action' => ['index'],
                            'method' => 'get',
                            <?php if ($generator->enablePjax): ?>
                                'options' => [
                                'data-pjax' => 1
                                ],
                            <?php endif; ?>
                            ]); ?>

                            <?php
                            $count = 0;
                            foreach ($generator->getColumnNames() as $attribute) {
                                if (++$count < 6) {
                                    echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                                } else {
                                    echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                                }
                            }
                            ?>
                            <div class="form-group">
                                <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Search') ?>, ['class' => 'btn btn-primary waves-effect waves-light']) ?>
                                <?= "<?= " ?>Html::resetButton(<?= $generator->generateString('Reset') ?>, ['class' => 'btn btn-default waves-effect waves-light']) ?>
                            </div>

                            <?= "<?php " ?>ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
