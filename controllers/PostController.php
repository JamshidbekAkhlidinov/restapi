<?php

namespace restapi\controllers;

use backend\models\News;
use yii\data\ActiveDataProvider;

class PostController extends MyController {

    //public $modelClass = News::class;

    public function actionIndex(){
        
        $models = new ActiveDataProvider([
            'query'=>News::find(),
            'pagination'=>[
                'pageSize'=>10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $models;
    }

    public  function actionCreate(){
        $model = new News();
        if($model->load(\Yii::$app->request->post(),'') and $model->save()){
            return $model;
        }
        return  $model;
    }

    public  function actionView($id){
        $model = News::findOne(['id'=>$id]);
        if($model){
            return  [
                'succes'=>true,
                'data'=>$model,
            ];
        }
        return [
            'succes'=>false,
            'errors'=>"Id mavjud emas",
        ];
    }



    public function actionUpdate($id){

        $model = News::findOne(['id'=>$id]);

            $model->load(\Yii::$app->request->post(),'');

            if($model->save()){
                return  [
                    'succes'=>true,
                    'data'=>$model,
                ];
            }else{
                return [
                    'succes'=>false,
                    'errors'=>$model->getErrors(),
                ];

            }

    }




}

?>