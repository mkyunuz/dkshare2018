<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Titik */

$this->title = 'Update Titik: ' . $model->titik_id;
$this->params['breadcrumbs'][] = ['label' => 'Master Titik', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titik_name, 'url' => ['view', 'id' => $model->titik_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
              
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-index col-lg-12">
<div class="titik-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</div>
</section>
