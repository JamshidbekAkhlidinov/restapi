<?php

namespace restapi\controllers;

use restapi\models\LoginForm;
use restapi\models\SignupForm;
use yii\rest\Controller;
use yii\web\Response;
use Yii;
class AuthController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
              //  'only' => ['view', 'index'],  // in a controller
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionLogin(){
        $model = new LoginForm();
        if($model->load(\Yii::$app->request->post(),'') && ($token = $model->login())){
            return [
                'success'=>true,
                'token'=>$token,
            ];
        }else{
            return [
            'success'=>false,
                'data'=>$model->getErrors(),
            ];
        }
    }

    public function actionReg(){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post(),'') && $model->signup()) {
            return [
                'success'=>true,
                'data'=>$model,
            ];
        }else{
            return [
                'success'=>false,
                'data'=>$model->getErrors(),
            ];
        }
    }

}