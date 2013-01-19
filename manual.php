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
class GPage extends defaultpage{

	public function GPage(){
		parent::defaultpage();
		$this->viewFile = "manual.phtml";
	}
}
$p = new GPage();
$p->run();
?>