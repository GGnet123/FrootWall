<?php


namespace frontend\controllers;


use admin\models\Articles;
use admin\models\User;
use frontend\models\Comments;
use yii\web\Controller;

class ContentController extends Controller
{
    public function actionIndex($id){
        $content = Articles::find()->where(['id'=>$id])->one();
        $commentsCnt = Comments::find()->where(['article_id'=>$id])->count();
        $model = new Comments();
        $comments = Comments::find()->where(['article_id'=>$id])->all();
        $user = User::findOne(['username'=>\Yii::$app->user->identity->username]);
        $userRole = $user->role;
        if ($model->load(\Yii::$app->request->post()) && $model->validate()){
            $model->article_id = $id;
            $model->user = \Yii::$app->user->identity->username;
            $model->save();
            $this->refresh();
            return $this->render('index',['content'=>$content,'model'=>$model,'comments'=>$comments,'commentsCnt'=>$commentsCnt,'role'=>$userRole]);
        }

        return $this->render('index',['content'=>$content,'model'=>$model,'comments'=>$comments,'commentsCnt'=>$commentsCnt,'role'=>$userRole]);
    }
    public function actionDelete($id){
        $user = User::findOne(['username'=>\Yii::$app->user->identity->username]);
        $userRole = $user->role;
        if ($userRole=='admin'){
            \Yii::$app->db->createCommand("DELETE FROM comments WHERE id=:id", [
                ':id' => $id
            ])->execute();
        }
        else{
            \Yii::$app->db->createCommand("UPDATE comments SET title=:title, comment=:comment WHERE id=:id", [
                ':title' => 'Коментарий был удален',
                ':comment' => null,
                ':id' => $id
            ])->execute();
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionEdit(){
        $request=\Yii::$app->request;
        $model = Comments::findOne(['id'=>$request->post('id')]);
        if ($model->comment != $request->post('comment')){
            $model->title =  '<p style="font-size: 10px">(изменено)</p>';
            $model->comment = $request->post('comment');

            $model->save();
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }
}