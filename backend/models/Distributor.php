<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "distributor".
 *
 * @property integer $id
 * @property string $distributor_name
 * @property string $username
 * @property string $distributor_id
 * @property integer $titik_id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Titik $titik
 */
class Distributor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $new_password;
    public $repeat_password;
    public static function tableName()
    {
        return 'distributor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['distributor_name', 'username', 'distributor_id', 'password_hash', 'email', 'titik_id'], 'required'],
            [['titik_id', 'status'], 'integer'],
            [['created_at', 'updated_at','new_password'], 'safe'],
            [['distributor_name'], 'string', 'max' => 150],
            [['username', 'distributor_id'], 'string', 'max' => 10],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            // ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'skipOnEmpty' => false, 'message'=>"Passwords don't match"],
            [['username'], 'unique', 'targetClass' => Distributor::className()],
            [['email'], 'unique'],
            [['distributor_id'], 'unique'],
            [['titik_id'], 'exist', 'skipOnError' => true, 'targetClass' => Titik::className(), 'targetAttribute' => ['titik_id' => 'titik_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'distributor_name' => 'Distributor Name',
            'username' => 'Username',
            'distributor_id' => 'Distributor ID',
            'titik_id' => 'Titik Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'repeat_password' => 'Retype Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'new_password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitik()
    {
        return $this->hasOne(Titik::className(), ['titik_id' => 'titik_id']);
    }
}
