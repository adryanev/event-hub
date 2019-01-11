<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/11/2019
 * Time: 10:45 PM
 */

namespace api\models;

use admin\models\ApplicationApi;
use common\models\StatusKonten;
use yii\base\Model;
use yii\web\IdentityInterface;

class AppIdentity extends Model implements IdentityInterface
{


    const STATUS_DELETED = 1;
    const STATUS_ACTIVE = 0;


    public $id;
    public $name;
    public $description;
    public $token;
    public $isDeleted;
    public $created_at;
    public $updated_at;

    private $_app;

    public function __construct($config)
    {
        if($config instanceof ApplicationApi){
            parent::__construct([]);
            $this->_app = $config;
            $this->id = $config->id;
            $this->name = $config->name;
            $this->token = $config->token;
            $this->isDeleted = $config->isDeleted;
            $this->created_at = $config->created_at;
            $this->updated_at = $config->updated_at;
        }
        elseif (is_array($config)){
            $this->_app = null;
            parent::__construct($config);
        }
        else{
            $this->_app = null;

        }
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        $app = ApplicationApi::findOne(['id'=>$id,'isDeleted'=>StatusKonten::STATUS_ACTIVE]);
        if(is_null($app)){
            return null;
        }
        return new self($app);


    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $app = ApplicationApi::findOne(['token'=>$token,'isDeleted'=>StatusKonten::STATUS_ACTIVE]);
        if(is_null($app)){
            return null;
        }

        return new self($app);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
       return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->token;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
       return $this->token === $authKey;
    }
}