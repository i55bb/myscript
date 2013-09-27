<?php




require( '.' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'boot.php' );
require_once( MODEL_PATH . 'battle.php' );
require_once( MODEL_PATH . DIRECTORY_SEPARATOR . 'battles' . DIRECTORY_SEPARATOR . 'war.php' );
class GPage extends SecureGamePage {
	var $showTroopsTable = FALSE;
	var $showWarResult = FALSE;
	var $errorText = '';
	var $troopsMetadata = null;
	var $warResult = null;

	function GPage() {
		parent::securegamepage();
		$this->viewFile = 'warsm.phtml';
		$this->contentCssClass = 'warsim';
	}

	function load() {
		parent::load();

		if ($this->isPost()) {
			if (( !isset( $_POST['a1'] ) || ( ( ( ( intval( $_POST['a1'] ) != 1 && intval( $_POST['a1'] ) != 2 ) && intval( $_POST['a1'] ) != 3 ) && intval( $_POST['a1'] ) != 7 ) && intval( $_POST['a1'] ) != 6 ) )) {
				$this->errorText = war_sim_noattack;
				return null;
			}


			if (( !isset( $_POST['ktyp'] ) || ( intval( $_POST['ktyp'] ) != 1 && intval( $_POST['ktyp'] ) != 2 ) )) {
				$this->errorText = war_sim_nobattletype;
				return null;
			}


			if (( !isset( $_POST['a2'] ) || sizeof( $_POST['a2'] ) == 0 )) {
				$this->errorText = war_sim_nodefense;
				return null;
			}

			foreach ($_POST['a2'] as $tribeId => $v) {
				if (( ( ( ( ( $tribeId != 1 && $tribeId != 2 ) && $tribeId != 3 ) && $tribeId != 4 ) && $tribeId != 7 ) && $tribeId != 6 )) {
					$this->errorText = war_sim_nodefense2;
					return null;
					continue;
				}
			}

			$this->troopsMetadata = $this->gameMetadata['troops'];
			$this->showTroopsTable = TRUE;
			$this->showWarResult = FALSE;

			if (!isset( $_POST['t1'] )) {
				return null;
			}

			$m = new WarBattleModel();

			if (( isset( $_POST['h_off_bonus1'] ) && 0 < intval( $_POST['h_off_bonus1'] ) )) {
				$this->showWarResult = TRUE;
			}

			$troops = array();
			$troopsPower = array();
			foreach ($_POST['t1'] as $tribeId => $troopArray) {
				foreach ($troopArray as $tid => $tnum) {
					if (0 < $tnum) {
						$this->showWarResult = TRUE;
					}

					$troops[$tid] = intval( $tnum );
					$troopsPower[$tid] = (( ( isset( $_POST['f1'] ) && isset( $_POST['f1'][$tribeId] ) ) && isset( $_POST['f1'][$tribeId][$tid] ) ) ? intval( $_POST['f1'][$tribeId][$tid] ) : 0);
				}
			}


			if (!$this->showWarResult) {
				return null;
			}

		    	$peopleCount = (isset( $_POST['ew1'] ) ? intval( $_POST['ew1'] ) : 0);
				$heroLevel = (isset( $_POST['h_off_bonus1'] ) ? intval( $_POST['h_off_bonus1'] ) : 0);
				$wringerPower = (isset( $_POST['kata'] ) ? intval( $_POST['kata'] ) : 0);
				$attackTroops = $m->_getTroopWithPower( $troops, $troopsPower, TRUE, $heroLevel, $peopleCount, $wringerPower, 0 );
				$peopleCount = (isset( $_POST['ew2'] ) ? intval( $_POST['ew2'] ) : 0);
				$wallLevel = (isset( $_POST['wall1'] ) ? intval( $_POST['wall1'] ) : 0);
				$totalDefensePower = 0;
				$defenseTroops = array();
				foreach ($_POST['t2'] as $tribeId => $troopArray) {
					$troops = array();
					$troopsPower = array();
					foreach ($troopArray as $tid => $tnum) {
						$troops[$tid] = intval( $tnum );
						$troopsPower[$tid] = (( ( isset( $_POST['f2'] ) && isset( $_POST['f2'][$tribeId] ) ) && isset( $_POST['f2'][$tribeId][$tid] ) ) ? intval( $_POST['f2'][$tribeId][$tid] ) : 0);
					}

					$defenseTroops[$tribeId] = $m->_getTroopWithPower( $troops, $troopsPower, FALSE, 0, $peopleCount, 0, $wallLevel );
					$totalDefensePower = $defenseTroops[$tribeId]['total_power'];
				}

				$this->warResult = $m->getWarResult( $attackTroops, $defenseTroops, $totalDefensePower, $wallLevel, 0 , ( isset( $_POST['ktyp'] ) && intval( $_POST['ktyp'] ) == 2 ) , FALSE );
				$m->dispose();
			}

		}
	}

$p = new GPage();
$p->run();
?>

