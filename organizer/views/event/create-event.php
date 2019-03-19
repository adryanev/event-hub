<?php

use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model organizer\models\CreateEventForm */

$this->title = 'Buat Event';
?>
<div class="create-event">

    <?= $this->render('_form',[
            'model'=>$model,
            'modelsTicket'=>$modelTicket,
            'dataTopic'=>$dataTopic,
            'dataType'=>$dataType
    ])?>


</div><!-- create-event -->
