<?php 

use yii\helpers\Url;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

use common\models\BackupFileLib;
use frontend\models\BackupFileDetail;

?>

 <?= Html::button('Upload File', ['value '=> Url::toRoute(['/backup-file/upload','w' => $week],['data-method' => 'post']), 'class' => 'btn btn-success', 'id'=> 'modalButton']) ?>

<?php
        Modal::begin([
                'header' => '<h4>Upload File</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
        echo '<div id="modalContent"></div>';
        Modal::end();
?>

<div class="clearfix">&nbsp;</div>
<div id="backupData"></div>
<!-- 
<div class="row">
    <?php
            $data = new BackupFileLib;
            $data->distributor_id = Yii::$app->user->identity->distributor_id;
            $data->week = $week;
            foreach ($data->getBackupFileDetail() as $key) {
                $fullPath = $key['path'];
                $filesize = filesize ($fullPath);

            ?>
                


                <div class="col-md-4 custom-col">
                    <div class="thumb-file">
                        <div class="thumb-file-icon">
                            <i class="fa fa-archive"></i>
                        </div>
                        <div class="thumb-file-info">
                            <p><?= $key['backup_file_name']; ?></p>
                            <p class="detail"><?php echo $data->human_filesize($filesize); ?> <?= date ("Y/m/d H:i", filemtime($fullPath)) ?></p>
                            <p class="detail"><a ><i class="fa fa-download"></i> Download</a>
                            <a ><i class="fa fa-trash"></i> Remove</a></p>
                        </div>
                    </div>
                </div>
           <?php }
           
          
    ?>
    
</div> -->
<?php
$distributor_id = $data->distributor_id;
$week = $data->week;
$script = <<< JS
    // $("#backupData").html('asd');
    loadData($week);
    function loadData(week=""){
        $.ajax({
            type:'POST',
            url: 'index.php?r=backup-file/get-list-of-data',
            data : { week : week},
            beforeSend : function(){
                $("#backupData").html('Loading...');
            },
            success: function(data){
                 $("#backupData").html(data)
            }
        })
    }
JS;
$this->registerJs($script);
?>