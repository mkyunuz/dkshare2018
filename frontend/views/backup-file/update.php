<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BackupFile */

$this->title = 'Update Backup File: ' . $model->backup_file_id;
$this->params['breadcrumbs'][] = ['label' => 'Backup Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->backup_file_id, 'url' => ['view', 'id' => $model->backup_file_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="backup-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
