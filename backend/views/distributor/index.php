<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistributorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distributors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php  if(Yii::$app->user->can('create-distributor')){ ?>
    <p>
        <?= Html::a('Create Distributor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'distributor_name',
            'username',
            'distributor_id',
            'titik_id',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
