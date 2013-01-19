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
require_once( MODEL_PATH."notes.php" );
class GPage extends securegamepage
{

    public $saved = NULL;

    public function GPage( )
    {
        parent::securegamepage( );
        $this->viewFile = "notes.phtml";
        $this->contentCssClass = "messages";
    }

    public function load( )
    {
        parent::load( );
        if ( !$this->data['active_plus_account'] )
        {
            exit( 0 );
        }
        else
        {
            $this->saved = FALSE;
            if ( $this->isPost( ) && isset( $_POST['notes'] ) )
            {
                $this->data['notes'] = $_POST['notes'];
                $m = new NotesModel( );
                $m->changePlayerNotes( $this->player->playerId, $this->data['notes'] );
                $m->dispose( );
                $this->saved = TRUE;
            }
        }
    }
}
$p = new GPage();
$p->run();
?>