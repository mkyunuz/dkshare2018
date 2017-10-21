<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BackupFile */

$this->title = 'Create Backup File';
$this->params['breadcrumbs'][] = ['label' => 'Backup Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backup-file-create">

   <!--  <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'week' => $week,
    ])
     ?>

</div>
