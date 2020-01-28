<?php
use \yii\helpers\Html;
use yii\widgets\ActiveForm;

if ($isHost){
     echo '<div class="header"><button class="editProfile" onclick="editProfile('.$user->id.')">Изменить</button></div>';
}
echo "<div class='ProfileContainer'><div class='userImg'>" . Html::img('assets/images/'.$user->image) . "</div>" .
     "<h1 class='UserName'>" . $user->first_name ." ". $user->last_name ."</h1>" .
     "<h3 class='Job'>" . $user->job ."</h3>" .
     "<h3 class='phone'>" . $user->phone_number ."</h3>" .
     "<h3 class='email'>" . $user->email ."</h3></div>";
echo "<div class='forSubmit'></div>"
?>
