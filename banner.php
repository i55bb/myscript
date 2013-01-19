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
require_once(MODEL_PATH.'advertising.php');
class GPage extends securegamepage{

	public function GPage(){
		parent::securegamepage();
	}

	public function load(){
		parent::load();
		if(isset($_GET['url']) && !empty($_GET['url'])){
			$advID = base64_decode( mysql_real_escape_string( trim( $_GET['url'] ) ) );
			if($advID != ""){
				$m = new AdvertisingModel();
				$url = $m->GoToBanner($advID);
				$m->dispose();
				$this->redirect($url);
			}
		}
	}
}
$p = new GPage();
$p->run();
?>