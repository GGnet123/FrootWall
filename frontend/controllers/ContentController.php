<?php


namespace frontend\controllers;


use admin\models\Articles;
use frontend\models\Comments;
use yii\web\Controller;

class ContentController extends Controller
{
    public function actionIndex($id){
        $content = Articles::find()->where(['id'=>$id])->all();
        $commentsCnt = Comments::find()->where(['article_id'=>$id])->count();
        $model = new Comments();
        $comments = Comments::find()->where(['article_id'=>$id])->all();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()){
            $model->article_id = $id;
            $model->user = \Yii::$app->user->identity->username;
            $model->save();
            $this->refresh();
            return $this->render('index',['content'=>$content,'model'=>$model,'comments'=>$comments,'commentsCnt'=>$commentsCnt]);
        }

        return $this->render('index',['content'=>$content,'model'=>$model,'comments'=>$comments,'commentsCnt'=>$commentsCnt]);
    }

}