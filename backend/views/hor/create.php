<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hor */

$this->title = 'Create Hor';
$this->params['breadcrumbs'][] = ['label' => 'Master Hor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="hor-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>