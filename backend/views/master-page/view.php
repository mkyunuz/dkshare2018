<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterPage */

$this->title = $model->master_id;
$this->params['breadcrumbs'][] = ['label' => 'Master Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->master_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->master_id], [
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
            'master_id',
            'master_name',
            'created_at',
        ],
    ]) ?>

</div>
