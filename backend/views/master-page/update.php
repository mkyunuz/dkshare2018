<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterPage */

$this->title = 'Update Master Page: ' . $model->master_id;
$this->params['breadcrumbs'][] = ['label' => 'Master Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->master_name, 'url' => ['view', 'id' => $model->master_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-page-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
