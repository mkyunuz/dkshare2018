
<?php
use common\models\BackupFileLib;
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

    ?>
        


        <div class="col-md-4 custom-col">
            <div class="thumb-file">
                <div class="thumb-file-icon">
                    <i class="fa fa-archive"></i>
                </div>
                <div class="thumb-file-info">
                    <p><?= $key['backup_file_name']; ?></p>
                    <p class="detail"><?php echo $backup->human_filesize($filesize); ?> <?= date ("Y/m/d H:i", filemtime($fullPath)) ?></p>
                    <p class="detail"><a ><i class="fa fa-download"></i> Download</a>
                    <a ><i class="fa fa-trash"></i> Remove</a></p>
                </div>
            </div>
        </div>
   <?php }
   
          
    ?>
</div>