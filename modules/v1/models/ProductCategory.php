<?php

namespace restapi\modules\v1\models;

class ProductCategory extends \backend\models\ProductCategory
{
    public function fields()
    {
        return [
            'id',
            'name',
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