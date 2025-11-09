<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property int $phone
 * @property string $username
 * @property string $login
 * @property string $password
 * @property string|null $token
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $passwordRepeat;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token'], 'default', 'value' => null],
            [['email', 'phone', 'username', 'login', 'password', 'passwordRepeat'], 'required'],
            [['phone'], 'integer'],
            ['login', 'unique'],
            [['email', 'username', 'login', 'password', 'token'], 'string', 'max' => 255],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', "min" => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Телефон',
            'username' => 'ФИО',
            'login' => 'Логин',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повторите пароль',
            'token' => 'Token',
        ];
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findByUsername($login)
    {
        return static::findOne(['login' => $login]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->token;
    }

    public function validateAuthKey($authKey)
    {
        return $this->token === $authKey;
    }
}
