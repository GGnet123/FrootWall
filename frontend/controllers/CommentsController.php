<?php


namespace frontend\controllers;


use frontend\models\Comments;
use yii\web\Controller;

class CommentsController extends Controller
{
    public function actionView()
    {
        $post=$this->loadModel();
        $comment=$this->newComment($post);

        $this->render('view',array(
            'model'=>$post,
            'comment'=>$comment,
        ));
    }

    protected function newComment($post)
    {
        $comment=new Comments();
        if(isset($_POST['Comment']))
        {
            $comment->attributes=$_POST['Comment'];
            if($post->addComment($comment))
            {
                if($comment->status==Comment::STATUS_PENDING)
                    Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
                $this->refresh();
            }
        }
        return $comment;
    }

}