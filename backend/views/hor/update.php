<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hor */

$this->title = 'Update Hor: ' . $model->hor_name;
$this->params['breadcrumbs'][] = ['label' => 'Master Hor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hor_name, 'url' => ['view', 'id' => $model->hor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hor-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>







<?php

$script = <<< JS
    $("#masterMenu").addClass('active');
JS;
$this->registerJs($script);
?>