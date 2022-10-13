<?php

namespace restapi\modules\v1\models;

class Products extends \backend\models\Products
{
    public function fields()
    {
        return [
            'id',
            'category_name'=>static function(\backend\models\Products $category){
                return $category->category->name;
            },
            'name',
            'img',
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