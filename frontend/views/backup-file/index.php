<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BackupFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backup Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .thumbs{
        margin-bottom:10px;
    }
    .thumbs > .row-thumbs{
        border: 1px solid rgba(0,0,0,.1);
    }
    .thumbs > .row-thumbs p{
        text-align: center;
        color : rgba(0,0,0,.5);
    }
</style>
<div class="backup-file-index">
<?php Pjax::begin(); ?>  
    <h1><?= Html::encode($this->title) ?></h1>
    <!-- <?php echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?= Html::a('Create Backup File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <!-- <?= Url::toRoute(['backup-file/create', 'id' => 42]); ?> -->
    <div class="row">
    <?php
        $i = 0;
        for($i=1;$i<=52;$i++){ ?>
            <a href="<?= Url::toRoute(['backup-file/data', 'w' => $i]); ?>" class="col-md-2 thumbs">
                <div class="row-thumbs">
                <p>Week <?= $i ?></p>
                </div>    
            </a>
     <?php   }
    ?>
</div>
</div>
