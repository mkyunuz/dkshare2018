<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\BackupFile */

$this->title = $model->backup_file_id;
$this->params['breadcrumbs'][] = ['label' => 'Backup Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backup-file-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->backup_file_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->backup_file_id], [
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
            'backup_file_id',
            'distributor_id',
            'backup_file_created_at',
            'backup_file_updated_at',
            'week',
        ],
    ]) ?>

</div>
