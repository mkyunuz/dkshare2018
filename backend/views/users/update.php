<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = 'Update Users: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name." ".$model->last_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
