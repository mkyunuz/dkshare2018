<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Titik */

$this->title = $model->titik_id;
$this->params['breadcrumbs'][] = ['label' => 'Master Titik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-index col-lg-12">
<div class="titik-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->titik_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->titik_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titik_id',
            'hor_id',
            'titik_name',
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</section>
