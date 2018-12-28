<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 25/01/18
 * Time: 13:45
 */
use yii\widgets\Breadcrumbs;
?>
<div class="content-page">
    <div class="content">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?php echo \yii2mod\alert\Alert::widget([
                'useSessionFlash' => true,
            ]);?>
            <?=$content?>
        </div>
    </div>

</div>

