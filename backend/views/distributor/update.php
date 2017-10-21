<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Distributor */

$this->title = 'Update Distributor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Distributors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distributor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
