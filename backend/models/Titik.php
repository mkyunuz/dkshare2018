<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "titik".
 *
 * @property integer $titik_id
 * @property integer $hor_id
 * @property string $titik_name
 *
 * @property Hor $hor
 */

class Titik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hor_id'], 'integer'],
            [['titik_name'], 'string', 'max' => 200],
            [['titik_name','hor_id'], 'required'],
            [['hor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hor::className(), 'targetAttribute' => ['hor_id' => 'hor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'titik_id' => 'Titik ID',
            'hor_id' => 'Hor Name',
            'titik_name' => 'Titik Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHor()
    {
        return $this->hasOne(Hor::className(), ['hor_id' => 'hor_id']);
    }
}
