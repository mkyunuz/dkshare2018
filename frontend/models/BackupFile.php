<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "backup_file".
 *
 * @property string $backup_file_id
 * @property string $distributor_id
 * @property string $backup_file_created_at
 * @property string $backup_file_updated_at
 * @property integer $week
 *
 * @property Distributor $distributor
 * @property BackupFileDetail $backupFileDetail
 */
class BackupFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'backup_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['backup_file_id'], 'required'],
            [['backup_file_created_at', 'backup_file_updated_at'], 'safe'],
            [['week'], 'integer'],
            [['backup_file_id'], 'string', 'max' => 16],
            [['distributor_id'], 'string', 'max' => 10],
            [['distributor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distributor::className(), 'targetAttribute' => ['distributor_id' => 'distributor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'backup_file_id' => 'Backup File ID',
            'distributor_id' => 'Distributor ID',
            'backup_file_created_at' => 'Backup File Created At',
            'backup_file_updated_at' => 'Backup File Updated At',
            'backup_file_name' => 'File',
            'week' => 'Week',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributor()
    {
        return $this->hasOne(Distributor::className(), ['distributor_id' => 'distributor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBackupFileDetail()
    {
        return $this->hasOne(BackupFileDetail::className(), ['backup_file_id' => 'backup_file_id']);
    }
}
