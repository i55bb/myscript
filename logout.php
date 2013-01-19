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
class GPage extends securegamepage{

	public function GPage(){
		parent::securegamepage();
		$this->viewFile = "logout.phtml";
		$this->contentCssClass = "logout";
	}

	public function load(){
		if($this->player->isSpy){
			$gameStatus = $this->player->gameStatus;
			$uid = $this->player->prevPlayerId;
			$this->player = new Player();
			$this->player->playerId = $uid;
			$this->player->isAgent = FALSE;
			$this->player->gameStatus = $gameStatus;
			$this->player->save( );
			$this->redirect("village1.php");
		}
		else{
			$this->player->logout( );
			//unset( $FN_5697176['player'] );
			unset($_SESSION);
			$this->player = NULL;
		}
	}

	public function preRender(){
	}
}
$p = new GPage();
$p->run();
?>