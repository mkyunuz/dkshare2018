<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $level_id
 *
 * @property Levels $level
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    // public $username;
    // public $first_name;
    // public $last_name;
    // public $email;
    
    public $new_password;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'username' , 'email', 'level_id'], 'required'],
            ['status', 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['username' , 'email'], 'string', 'max' => 255],
            [['level_id'], 'string', 'max' => 15],
            ['username', 'unique','message' => 'This email address has already been taken.'],
           
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Levels::className(), 'targetAttribute' => ['level_id' => 'level_id']],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['email','email'],
            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'level_id' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Levels::className(), ['level_id' => 'level_id']);
    }
    /* public function signup()
    {
        if (!$this->validate()) {
            return null;
            die();
        }
        
        $user = new User();
       
        $this->setPassword($this->password_hash);
        $this->generateAuthKey();
        
        return $this->save() ? $user : null;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }*/
}
