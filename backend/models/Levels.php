<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "levels".
 *
 * @property string $level_id
 * @property string $level_name
 *
 * @property User[] $users
 */
class Levels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'levels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id', 'level_name'], 'required'],
            [['level_id'], 'string', 'max' => 15],
            [['level_name'], 'string', 'max' => 25],
            [['level_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'level_name' => 'Level Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['level_id' => 'level_id']);
    }
}
