<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Distributor */

$this->title = 'Update Distributor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Distributor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->distributor_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distributor-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
