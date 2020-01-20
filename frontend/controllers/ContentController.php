<?php


namespace frontend\controllers;


use admin\models\Articles;
use yii\web\Controller;

class ContentController extends Controller
{
    public function actionIndex($id){
        $content = Articles::find()->where(['id'=>$id])->all();
        return $this->render('index',['content'=>$content]);
    }
}