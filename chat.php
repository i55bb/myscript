<?php
#################################################################################
##                                                                             ##
##                                                                             ##
## --------------------------------------------------------------------------- ##
##                                                                             ##
##  Project:       TATAR WARS                                                  ##
##  Version:       2012.3.15                                                   ##
##  License:       Creative Commons BY-NC-SA 3.0                               ##
##  Copyright:     Bazaid (c) 2012 - All rights reserved                       ##
##  Source code:   https://github.com/Bazaid/tatar-wars                        ##
##                                                                             ##
#################################################################################

require(".".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."boot.php");
require_once(MODEL_PATH."chat.php");
require_once(MODEL_PATH."wordsfilter.php");
class GPage extends securegamepage{

	public $chats = NULL;
	public $Filter = NULL;

	public function GPage(){
		parent::securegamepage();
		$this->viewFile = "chat.phtml";
		$this->contentCssClass = "player";
	}

	public function load(){
		parent::load();
		$this->Filter = new FilterWordsModel();
		$m = new ChatModel();
		if($this->isPost() && isset($_POST['text'])){
			$text = stripslashes(htmlspecialchars(trim($_POST['text'])));
			if($text != ""){
				$m->SendToChat( $this->data['name'], $this->player->playerId, $text );
			}
		}
		$m->DeleteOldChat();
		$this->chats = $m->GetFromChat();
		$m->dispose();
	}
}
$p = new GPage();
$p->run();
?>