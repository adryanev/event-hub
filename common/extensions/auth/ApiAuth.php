<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/11/2019
 * Time: 10:31 PM
 */
namespace common\extensions\auth;

use admin\models\ApplicationApi;
use api\models\AppIdentity;
use common\models\StatusKonten;


class ApiAuth extends \yii\filters\auth\AuthMethod
{

    /**
     * Authenticates the current user.
     * @param \yii\web\User $user
     * @param \yii\web\Request $request
     * @param \yii\web\Response $response
     * @return \yii\web\IdentityInterface the authenticated user identity. If authentication information is not provided, null will be returned.
     * @throws \yii\web\UnauthorizedHttpException if authentication information is provided but is invalid.
     */
    public function authenticate($user, $request, $response)
    {
        $accessToken = $request->getAuthUser();
        if(empty($accessToken)){
            return null;
        }
        else{
            $appIdentity = $this->findAppByToken($accessToken);
            if(is_null($appIdentity)){
                $this->handleFailure($response);
            }
            else{
                $user->switchIdentity($appIdentity);
            }

            return $appIdentity;
        }
    }

    private function findAppByToken($accessToken)
    {
        $application = ApplicationApi::findOne(['token'=>$accessToken, 'isDeleted'=>StatusKonten::STATUS_ACTIVE]);
        if(is_null($application)) return null;
        else{

            $config = [
                'id' => $application->id,
                'name'=> $application->name,
                'description'=> $application->description,
                'token'=>$application->token,
                'created_at'=>$application->created_at,
                'updated_at'=>$application->updated_at,
                'isDeleted'=>$application->isDeleted
            ];

            $appIdentity = new AppIdentity($config);
            return $appIdentity;

        }
    }
}