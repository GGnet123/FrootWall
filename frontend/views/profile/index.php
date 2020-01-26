<?php
use \yii\helpers\Html;
echo "<div class='ProfileContainer'><div class='userImg'>" . Html::img('assets/images/'.$user->image) . "</div>" .
    "<button class='editImg'>Edit</button>" .
     "<h1 class='UserName'>" . $user->first_name ." ". $user->last_name ."</h1>" .
     "<h3 class='Job'>" . $user->job ."</h3></div>" ;
?>
