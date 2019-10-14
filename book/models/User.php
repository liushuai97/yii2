<?php

namespace app\models;

use Yii;

// class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    // public $id;
    // public $username;
    // public $password;
    // public $authKey;
    // public $accessToken;

    public $id;
    public $username;
    public $email;
    public $password;
    public $status;
    public $authKey;
    public $accessToken;

    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];


    /**
     * {@inheritdoc}
     */
    // public static function findIdentity($id)
    // {
    //     return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    // }
    public static function findIdentity($id) {
        $user = self::findById($id);
        if ($user) {
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    // public static function findIdentityByAccessToken($token, $type = null)
    // {
    //     foreach (self::$users as $user) {
    //         if ($user['accessToken'] === $token) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }
    public static function findIdentityByAccessToken($token, $type = null) {
        $user = Users::find()->where(array('accessToken' => $token))->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    // public static function findByUsername($username)
    // {
    //     foreach (self::$users as $user) {
    //         if (strcasecmp($user['username'], $username) === 0) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }
    public static function findByUsername($username) {
        $user = Users::find()->where(array('username' => $username))->one();
        if ($user) {
            return new static($user);
        }

        return null;
    }

    public static function findById($id) {
        $user = Users::find()->where(array('id' => $id))->asArray()->one();
        if ($user) {
            return new static($user);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
