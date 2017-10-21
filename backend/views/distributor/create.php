<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Distributor */

$this->title = 'Create Distributor';
$this->params['breadcrumbs'][] = ['label' => 'Distributors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
