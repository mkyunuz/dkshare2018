
<?php
use common\models\BackupFileLib;
use yii\helpers\Url;
	// echo '<pre>';
 //   print_r($data);
 //   die();
?>



<div class="row">
<?php
	$backup = new BackupFileLib;
    foreach ($data as $key) {
        $fullPath = $key['path'];
        $filesize = filesize ($fullPath);
        // echo $key['backup_file_detail_id'];

    ?>
        


        <div class="col-md-4 custom-col">
            <div class="thumb-file">
                <div class="thumb-file-icon">
                    <i class="fa fa-archive"></i>
                </div>
                <div class="thumb-file-info">
                    <p><?= $key['backup_file_name']; ?></p>
                    <p class="detail"><?php echo $backup->human_filesize($filesize); ?> <?= date ("Y/m/d H:i", filemtime($fullPath)) ?></p>
                    <p class="detail"><a href="<?= Url::toRoute(['/backup-file/download','id' => $key['backup_file_detail_id'] ])?>" target="__blank"><i class="fa fa-download"></i> Download</a>
                    <a href="<?= Url::toRoute(['/backup-file/delete-files','id' => $key['backup_file_detail_id'] ])?>"><i class="fa fa-trash"></i> Remove</a></p>
                </div>
            </div>
        </div>
   <?php }
   
          
    ?>
</div>