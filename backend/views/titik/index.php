<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\bootstrap\Modal;

use yii\helpers\url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TitikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titiks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Titik', ['create'], ['class' => 'btn btn-success']) ?> -->
          <?= Html::button('Create Titik', ['value '=> Url::to('index.php?r=titik/create'), 'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>
    </p>
     <?php
        Modal::begin([
                'header' => '<h4>Create Branch</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
        echo '<div id="modalContent"></div>';
        Modal::end();
    ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'titik_id',
            // 'hor_id',
            ['attribute' => 'hor_id', 'value' => 'hor.hor_name'],
            'titik_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
