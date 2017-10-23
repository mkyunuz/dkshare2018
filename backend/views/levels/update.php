<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Levels */

$this->title = 'Update Levels: ' . $model->level_id;
$this->params['breadcrumbs'][] = ['label' => 'Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->level_id, 'url' => ['view', 'id' => $model->level_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="levels-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
