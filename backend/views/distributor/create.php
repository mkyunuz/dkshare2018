<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Distributor */

$this->title = 'Create Distributor';
$this->params['breadcrumbs'][] = ['label' => 'Master Distributor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributor-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
