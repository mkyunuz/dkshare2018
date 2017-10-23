<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MasterPage */

$this->title = 'Create Master Page';
$this->params['breadcrumbs'][] = ['label' => 'Master Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-page-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
