<?php

namespace restapi\modules\v1\controllers;


use restapi\controllers\MyController;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends MyController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        return [
            'success'=>true,
            'data'=>[
                'author'=>"Jamshidbek Axlidinov",
                'tg_user'=>"t.me/JamshidbekAxlidinov",
                'time'=>date('H:i:s d-m Y '),
            ]
        ];
    }
}
