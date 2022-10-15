<?php

namespace restapi\modules\v1\controllers;

use restapi\controllers\MyController;
use restapi\modules\v1\models\Products;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\UploadedFile;

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

        $model->load(\Yii::$app->request->post(),'');

        $file = UploadedFile::getInstanceByName('img');
        if($file){

            $rand = Yii::$app->security->generateRandomString(20);

            $path = "photo/".$rand.".".$file->extension;
            $file->saveAs($path); 

            $model->img = $rand.".".$file->extension;
        }else{
            $model->img = "no-img.jpg";
        }

        if($model->save()){
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
        
            if(!$model){
                return [
                    'succes'=>false,
                    'errors'=>"Bunday id mavjud emas",
                ];
            }

            $name =  $model->img;
            $model->load(\Yii::$app->request->post(),'');
            
            $file = UploadedFile::getInstanceByName('img');

            if($file){
                if(isset($model->img) && $model->img!="no-img.jpg" && file_exists("@web/photo/".$model->img)){
                    unlink(Url::to("@web/photo/".$model->img));
                }
                $rand = Yii::$app->security->generateRandomString(20);
                $name = $rand.".".$file->extension;
                $path = "photo/".$name;
                $file->saveAs($path); 
                $model->img = $name;
            }else{
                $model->img = $name;
            }
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