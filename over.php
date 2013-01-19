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

require('.'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'boot.php');
require_once(MODEL_PATH.'profile.php');
class GPage extends gamepage{

	public $playerData = NULL;

	public function GPage(){
		parent::gamepage();
		$this->viewFile = "over.phtml";
		$this->contentCssClass = "messages";
	}

	public function load(){
		parent::load();
		if(!$this->globalModel->isGameOver()){
			exit(0);
		}
		else{
			$m = new ProfileModel();
			$this->playerData = $m->getWinnerPlayer();
			$m->dispose();
		}
	}
}
$p = new GPage();
$p->run();
?>