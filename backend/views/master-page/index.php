<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MasterPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Pages';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="col-lg-12 connectedSortable">
          <div class="box no-radius">
            <div class="box-header">
                <?php  if(Yii::$app->user->can('create-master-page')){ ?>
                        <?= Html::a('Create Master Page', ['create'], ['class' => 'btn btn-primary']) ?>
                <?php } ?>
            </div>
            <div class="box-body table-responsive no-padding">
<div class="master-page-index col-lg-12">

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'master_id',
            'master_name',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    
</div>
</div>
</div>
</section>


<?php

$script = <<< JS
    $("#utilitesMenu").addClass('active');
JS;
$this->registerJs($script);
?>