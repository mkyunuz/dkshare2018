<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "backup_file_detail".
 *
 * @property string $backup_file_detail_id
 * @property string $backup_file_id
 * @property string $backup_file_name
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BackupFile $backupFile
 */
class BackupFileDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'backup_file_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['backup_file_detail_id', 'backup_file_id', 'path'], 'required'],
            [['path'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['backup_file_detail_id'], 'string', 'max' => 20],
            [['backup_file_id'], 'string', 'max' => 16],
            [['backup_file_name'], 'string', 'max' => 100],
            [['backup_file_id'], 'exist', 'skipOnError' => true, 'targetClass' => BackupFile::className(), 'targetAttribute' => ['backup_file_id' => 'backup_file_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'backup_file_detail_id' => 'Backup File Detail ID',
            'backup_file_id' => 'Backup File ID',
            'backup_file_name' => 'Backup File Name',
            'path' => 'Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackupFile()
    {
        return $this->hasOne(BackupFile::className(), ['backup_file_id' => 'backup_file_id']);
    }
}
