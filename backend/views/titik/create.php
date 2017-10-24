<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Titik */

$this->title = 'Create Titik';
$this->params['breadcrumbs'][] = ['label' => 'Titiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titik-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
