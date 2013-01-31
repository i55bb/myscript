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


class PaymentModel extends ModelBase
{

    public function incrementPlayerGold( $playerId, $goldNumber )
    {
        $this->provider->executeQuery( "UPDATE p_players p \r\n\t\t\tSET\r\n\t\t\t\tp.gold_num=gold_num+%s\r\n\t\t\tWHERE p.id=%s", array(
            $goldNumber,
            $playerId
        ) );
    }

}

?>
