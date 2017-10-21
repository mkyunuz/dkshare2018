<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MasterPage */

$this->title = 'Create Master Page';
$this->params['breadcrumbs'][] = ['label' => 'Master Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
