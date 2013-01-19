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
class GPage extends securegamepage{

	public $saved = NULL;
	public $siteNews = NULL;

	public function GPage(){
		parent::securegamepage();
		$this->layoutViewFile = "layout".DIRECTORY_SEPARATOR."form.php";
		$this->viewFile = "shownvill.phtml";
		$this->contentCssClass = "messages";
		$this->checkForNewVillage = FALSE;
	}

	public function load(){
		parent::load();
		if(intval( $this->data['create_nvil'] ) == 0 || $this->player->isSpy){
			$this->redirect( "village1.php" );
		}
		else{
			$this->globalModel->resetNewVillageFlag( $this->player->playerId );
		}
	}
}
$p = new GPage();
$p->run();
?>