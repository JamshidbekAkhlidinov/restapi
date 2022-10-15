<?php

namespace restapi\modules\v1\models;

use backend\models\Products as ModelsProducts;
use yii\helpers\Url;

class Products extends ModelsProducts
{
    public function fields()
    {
        return [
            'id',
            'category_name'=>static function(ModelsProducts $category){
                return $category->category->name;
            },
            'name',
            'img'=>static function(ModelsProducts $category){
                return "http://".$_SERVER['SERVER_NAME']."/".Url::to("@web")."/photo/".$category->img;
            },
            'content',
            'price',
        ];
    }
    public function extraFields()
    {
        return [
            'created_at'=>static function($date){
                return date('H:i:s d-m Y',$date->created_at);
            },
            'updated_at'=>static function($date){
                return date('H:i:s d-m Y',$date->updated_at);
            },

        ];
    }
}