<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auth_rule_master".
 *
 * @property string $master_id
 * @property string $master_name
 * @property string $created_at
 *
 * @property AuthItem[] $authItems
 */
class AuthRuleMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_rule_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['master_id', 'master_name'], 'required'],
            [['created_at'], 'safe'],
            [['master_id', 'master_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'master_id' => 'Master ID',
            'master_name' => 'Master Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItems()
    {
        return $this->hasMany(AuthItem::className(), ['master_id' => 'master_id']);
    }
}
