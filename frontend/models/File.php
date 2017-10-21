<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property integer $file_id
 * @property string $file_name
 * @property string $file_path
 */
class File extends \yii\db\ActiveRecord
{
    public $file_name2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_name', 'file_path'], 'required'],
            [['file_name'], 'string', 'max' => 100],
            [['file_path'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_name' => 'File Name',
            'file_path' => 'File Path',
        ];
    }
}
