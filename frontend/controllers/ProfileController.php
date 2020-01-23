<?php


namespace frontend\controllers;


use admin\models\User;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionShow(){
        $id = \Yii::$app->request->get('id');
        $user = User::findOne(['id'=>$id]);
        if (empty($user)) return false;
        return $this->renderPartial('index',['user'=>$user]);
    }
    public function actionAddImage(){

    }
}