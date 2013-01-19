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


require( ".".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."boot.php" );
require_once( MODEL_PATH."chat.php" );
require_once( MODEL_PATH."wordsfilter.php" );
class GPage extends SecureGamePage
{

    public $chats = NULL;
    public $Filter = NULL;

    public function GPage( )
    {
        $this->customLogoutAction = TRUE;
        parent::securegamepage( );
        if ( $this->player == NULL )
        {
            exit( 0 );
        }
        $this->layoutViewFile = $this->viewFile = NULL;
        $_GET['_a1_'] = "";
    }

    public function load( )
    {
        parent::load( );
        $this->Filter = new FilterWordsModel( );
        $m = new ChatModel( );
        $this->chats = $m->GetFromChat( );
        $storCtat = array( );
        while ( $this->chats->next( ) )
        {
            $text = $this->Filter->FilterWords( $this->chats->row['text'] );
            $storCtat[$this->chats->row['ID']] = array(
                date( "g:i A", $this->chats->row['date'] ),
                $this->chats->row['username'],
                $text,
                $this->chats->row['userid']
            );
        }
        ksort( $storCtat );
        foreach ( $storCtat as $ChatLine )
        {
            echo "<div class=\"msgln\">(".$ChatLine[0].") <b><a href=\"profile.php?uid=".$ChatLine[3]."\" target=\"_blank\">".$ChatLine[1]."</a></b>: ".$ChatLine[2]."<br></div>";
        }
        $m->dispose( );
    }

}

$p = new GPage( );
$p->run( );
?>
