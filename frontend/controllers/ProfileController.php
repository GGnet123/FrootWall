<?php


namespace frontend\controllers;


use admin\models\Categories;
use admin\models\User;
use yii\bootstrap\Modal;
use yii\web\Controller;
use yii\web\UploadedFile;

class ProfileController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionShow(){
        $id = \Yii::$app->request->get('id');
        $user = User::findOne(['id'=>$id]);
        if (empty($user)) return false;
        if ($id!=\Yii::$app->user->identity->id){
            return $this->renderPartial('index',['user'=>$user,'isHost'=>false]);
        }
        else{
            return $this->renderPartial('index',['user'=>$user,'isHost'=>true]);
        }

    }

    public function actionAddImage(){
        $model = User::findOne(\Yii::$app->user->identity->id);

        $model->load(\Yii::$app->request->post(), '');
        $file = UploadedFile::getInstanceByName('file');
        $model->image = $file;
        $model->image->saveAs(\Yii::getAlias('@frontend').'/web/assets/images/'.$model->username.'.'.$file->extension);
        $model->image = $model->username.'.'.$file->extension;
        $model->save();
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionEdit(){
        $id = \Yii::$app->request->post('id');
        $fullName = \Yii::$app->request->post('fullName');
        $phone = \Yii::$app->request->post('phone');
        $email = \Yii::$app->request->post('email');

        $first_name = explode(' ', $fullName)[0];
        $last_name = explode(' ', $fullName)[1];


        $user = User::findOne(['id'=>$id]);
        if ($first_name!=''){
            $user->first_name = $first_name;
        }
        if ($last_name!=''){
            $user->last_name = $last_name;
        }
        $user->phone_number = $phone;
        $user->email = $email;
        $user->save();

        return $this->redirect(\Yii::$app->request->referrer);
    }
    public function actionEmployers(){
        $categories = Categories::find()->all();
        return $this->render('employers',['categories'=>$categories]);
    }
}