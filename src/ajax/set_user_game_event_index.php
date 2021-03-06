<?php
require(AppSettings::srcPath()."/includes/connect.php");
require(AppSettings::srcPath()."/includes/get_session.php");

if ($thisuser && $game && $app->synchronizer_ok($thisuser, $_REQUEST['synchronizer_token'])) {
	$event_index = (int) $_REQUEST['event_index'];
	
	$user_game = $thisuser->ensure_user_in_game($game, false);
	
	$app->run_query("UPDATE user_games SET event_index=:event_index WHERE user_game_id=:user_game_id;", [
		'event_index' => $event_index,
		'user_game_id' => $user_game['user_game_id']
	]);
	
	echo "1";
}
else echo "0";
?>