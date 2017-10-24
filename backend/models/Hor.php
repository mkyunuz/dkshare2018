<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hor".
 *
 * @property integer $hor_id
 * @property string $hor_name
 *
 * @property Titik[] $titiks
 */
class Hor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hor_name'], 'string', 'max' => 100],
            ['hor_name', 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hor_id' => 'HOR ID',
            'hor_name' => 'HOR Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitiks()
    {
        return $this->hasMany(Titik::className(), ['hor_id' => 'hor_id']);
    }
}
