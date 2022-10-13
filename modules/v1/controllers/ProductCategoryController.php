<?php

namespace restapi\modules\v1\controllers;

use restapi\controllers\MyController;
use restapi\modules\v1\models\ProductCategory;
use yii\data\ActiveDataProvider;

class ProductCategoryController extends MyController
{

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query'=>ProductCategory::find(),
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
        $model = new ProductCategory();
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
        $model = ProductCategory::findOne(['id'=>$id]);
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

        $model = ProductCategory::findOne(['id'=>$id]);
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
        $model = ProductCategory::findOne(['id'=>$id]);
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