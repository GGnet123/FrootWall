<?php


namespace frontend\controllers;


use admin\models\Categories;
use admin\models\User;
use frontend\models\Requests;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\UploadedFile;

class RequestsController extends Controller
{
    protected $files;
    public function actionIndex(){
        $model = Requests::find()->orderBy(['id'=>SORT_DESC]);
        $count = $model->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize' => 6]);

        $requests = $model->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index',['requests'=>$requests,'pages'=>$pagination]);
    }
    public function actionCreate(){
        $model = new Requests();
        return $this->render('create',['model'=>$model]);
    }
    public function actionUpload(){
        $model = new Requests();
        $model->load(\Yii::$app->request->post(), '');
        $file = UploadedFile::getInstanceByName('Requests[docs]');

        if ($file!=null){
            $path = \Yii::getAlias('@frontend').'/web/assets/docs/';
            $model->docs = $file;
            $model->docs->saveAs($path . $file->name);
            return Json::encode([
                'files' => [
                    [
                        'name' => $file->name,
                        'size' => $file->size,
                        'url' => $path,
                        'thumbnailUrl' => $path,
                        'deleteUrl' => 'index.php?r=requests/file-delete&name=' . $file->name,
                        'deleteType' => 'POST',
                    ],
                ],
            ]);
        }
        else{
            return '';
        }
    }
    public function actionFileDelete($name){
        $directory = \Yii::getAlias('@frontend/web/assets/docs') . DIRECTORY_SEPARATOR;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }

        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file) {
            $fileName = basename($file);
            $path = '/assets/docs/' . $fileName;
            $output['files'][] = [
                'name' => $fileName,
                'size' => filesize($file),
                'url' => $path,
                'thumbnailUrl' => $path,
                'deleteUrl' => 'index.php?r=requests/file-delete&name=' . $fileName,
                'deleteType' => 'POST',
            ];
        }
        return Json::encode($output);
    }
    public function actionSave(){
        $model = new Requests();
        $model->date = \Yii::$app->request->post('date');
        $model->category_id = \Yii::$app->request->post('category_id');
        $users = \Yii::$app->request->post('to_users_id');
        $model->to_users_id = implode(",",$users);
        $model->from_user_id = \Yii::$app->user->identity->id;
        $model->docs = implode(',',\Yii::$app->request->post('docs'));
        $user = User::findOne(\Yii::$app->user->identity->id);

        if ($model->save()){
            for ($i=0;$i<sizeof($users);$i++){
                \Yii::$app->mailer->compose()
                    ->setFrom('email@gmail.com')
                    ->setTo(User::findOne($users[$i])->email)
                    ->setSubject('Froot')
                    ->setTextBody($user->full_name . ' подал на вас заявку')
                    ->send();
            }
        }
        return $this->redirect(['requests/index']);
    }
    public function actionChangeStatus(){
        $id = \Yii::$app->request->post('id');
        $request = Requests::findOne($id);
        $request->status = 2;
        $request->save();
        return $this->redirect(\Yii::$app->request->referrer);
    }
    public function actionUsersByCategory(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $id = $parents[0];
                foreach (Categories::findOne($id)->users as $user){
                    $out[] = [
                        'id'=>$user->id,
                        'name'=>$user->full_name
                    ];
                };

                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }
    public function actionUploadDocs($id){
        $files = Requests::findOne($id)->docs;
        if (strpos($files,',')===false){
            $res = \Yii::$app->response;
            $res->setDownloadHeaders($files);
            $res->sendFile(\Yii::getAlias('@frontend').'/web/assets/docs/'.$files);
        }
        else{
            $files = explode(',',$files);
            foreach ($files as $file){
                $res = \Yii::$app->response;
                $res->setDownloadHeaders($file);
                $res->sendFile(\Yii::getAlias('@frontend').'/web/assets/docs/'.$file);
            }
        }
    }
}