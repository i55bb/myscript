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
##                 http://sourceforge.net/projects/tatarwars/                  ##
#################################################################################

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> \r\n<html>\r\n<head>\r\n\t<title>";
echo $this->title;
echo "</title>\r\n\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n\t<meta http-equiv=\"imagetoolbar\" content=\"no\" />\r\n\t<meta http-equiv=\"cache-control\" content=\"max-age=0\" />\r\n\t<meta http-equiv=\"pragma\" content=\"no-cache\" />\r\n\t<meta http-equiv=\"expires\" content=\"0\" />\r\n\t<link href=\"assets/default/lang/";
echo $this->appConfig['system']['lang'];
echo "/lang.css";
echo $this->getAssetVersion( );
echo "\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t<link href=\"assets/default/lang/";
echo $this->appConfig['system']['lang'];
echo "/compact.css";
echo $this->getAssetVersion( );
echo "\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t";
echo "<s";
echo "cript type=\"text/javascript\">var d3l=";
echo $this->appConfig['system']['lang'] == "ar" ? "180" : "-600";
echo ";</script>\r\n\t";
echo "<s";
echo "cript src=\"assets/core.js";
echo $this->getAssetVersion( );
echo "\" type=\"text/javascript\"></script>\r\n</head>\r\n<body class=\"manual\">";
$this->printContent( );
echo "</body>\r\n";
echo "<s";
echo "cript type=\"text/javascript\">init();</script>\r\n</html>";
?>
