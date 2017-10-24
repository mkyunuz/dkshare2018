<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = 'Create Auth Item';
$this->params['breadcrumbs'][] = ['label' => 'Master Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
