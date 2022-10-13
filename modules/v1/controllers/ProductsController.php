<?php

namespace restapi\modules\v1\controllers;

use restapi\controllers\MyController;
use restapi\modules\v1\models\Products;
use yii\data\ActiveDataProvider;

class ProductsController extends MyController
{

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query'=>Products::find(),
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>[
                    'id'=>SORT_DESC,
                ],
            ],
        ]);

        return $dataProvider;

    }

    public  function actionCreate(){
        $model = new Products();
        if($model->load(\Yii::$app->request->post(),'') and $model->save()){
            return [
                'success'=>true,
                'data'=>$model,
            ];
        }
        return [
            'success'=>false,
            'data'=>$model->getErrors(),
        ];
    }

    public function actionView($id){
        $model = Products::findOne(['id'=>$id]);
        if($model){
            return [
                'success'=>true,
                'data'=>$model,
            ];
        }
        return [
            'success'=>false,
            'data'=>"Malumot mavjud emas",
        ];
    }


    public function actionUpdate($id){

        $model = Products::findOne(['id'=>$id]);
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

    public function actionDelete($id){
        $model = Products::findOne(['id'=>$id]);
        //$model->load(\Yii::$app->request->post(),'');

        if($model && $model->delete()){
            return [
                'success'=>true,
                'data'=>"Deleted",
            ];
        }
        return [
            'success'=>false,
            'data'=>"Malumot mavjud emas",
        ];
    }

}