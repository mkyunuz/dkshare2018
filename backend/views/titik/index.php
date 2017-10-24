<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\bootstrap\Modal;

use yii\helpers\url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TitikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Titik';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
                <?php  if(Yii::$app->user->can('create-titik')){ ?>
                       <?= Html::button('<i class="fa fa-plus"></i>&nbsp; Create Titik', ['value '=> Url::to('index.php?r=titik/create'), 'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>
                <?php } ?>
            </div>
            <div class="box-body table-responsive no-padding">
<div class="distributor-index col-lg-12">
<div class="titik-index">

     <?php
        Modal::begin([
                'header' => '<h4>Create Titik</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
        echo '<div id="modalContent"></div>';
        Modal::end();
    ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'titik_id',
            // 'hor_id',
            ['attribute' => 'hor_id', 'value' => 'hor.hor_name'],
            'titik_name',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button class="btn btn-warning btn-sm"><span class="fa fa-eye"></span></button> ', $url, [
                                    'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a('<button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>', $url, [
                                    'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a(' <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>', $url, [
                                    'title' => Yii::t('app', 'lead-delete'),
                                        'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                                        'data-method' => 'post',
                        ]);
                    }

                  ],
                  'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Url::toRoute(['/titik/view','id' => $model->titik_id]);
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = Url::toRoute(['/titik/update','id' => $model->titik_id]);
                        return $url;
                    }
                    if ($action === 'assignment') {
                        $url = Url::toRoute(['/titik/user-assignment','id' => $model->titik_id]);
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = Url::toRoute(['/titik/delete','id' => $model->titik_id]);
                        return $url;
                    }

                  }

            ],

        ],
        
    ]); ?>
<?php Pjax::end(); ?>
    
</div>
</div>
</div>
</div>
</section>







<?php

$script = <<< JS
    $("#masterMenu").addClass('active');
JS;
$this->registerJs($script);
?>