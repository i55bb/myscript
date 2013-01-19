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
require_once(MODEL_PATH."news.php");
class GPage extends securegamepage{

	public $saved = NULL;
	public $siteNews = NULL;

	public function GPage(){
		parent::securegamepage();
		$this->layoutViewFile = "layout".DIRECTORY_SEPARATOR."form.php";
		$this->viewFile = "shownew.phtml";
		$this->contentCssClass = "messages";
		$this->checkForGlobalMessage = FALSE;
		$this->checkForNewVillage = FALSE;
	}

	public function load(){
		parent::load();
		if(intval($this->data['new_gnews']) == 0 || $this->player->isSpy){
			$this->redirect( "village1.php" );
		}
		else{
			$m = new NewsModel();
			$this->siteNews = $m->getGlobalSiteNews();
			$m->dispose();
		}
	}
}
$p = new GPage();
$p->run();
?>