<?php
use \yii\helpers\Html;
echo "<div class='ProfileContainer'><div class='userImg'>" . Html::img('assets/images/'.$user->image) . "</div>" .
     "<h1 class='UserName'>" . $user->username ."</h1></div>";
?>
