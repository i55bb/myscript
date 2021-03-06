<?php






	require( '.' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'boot.php' );
	require_once( MODEL_PATH . 'friends.php' );
	class GPage extends SecureGamePage {
		var $friends = array();
		var $pageSize = 20;
		var $pageIndex = null;
		var $pageCount = null;

		function GPage() {
			parent::securegamepage();
			$this->viewFile = 'friends.phtml';
			$this->contentCssClass = 'player';
		}

		function load() {
			parent::load();
			$this->pageIndex = (( isset( $_GET['p'] ) && is_numeric( $_GET['p'] ) ) ? intval( $_GET['p'] ) : 0);
			
			$m = new FriendsModel();
			$rowsCount = $m->getFriendsCount( $this->player->playerId );
			$this->pageCount = (0 < $rowsCount ? ceil( $rowsCount / $this->pageSize ) : 1);

			if (( isset( $_GET['DFid'] ) && !empty( $_GET['DFid'] ) )) {
				$FriendID = mysql_real_escape_string( trim( $_GET['DFid'] ) );

				if ($FriendID != '') {
					$m->DeleteFriend( $FriendID, $this->player->playerId );
					$m->dispose();
					$this->redirect( 'friends.php' );
					return null;
				}
			}


			if (( isset( $_GET['CFid'] ) && !empty( $_GET['CFid'] ) )) {
				$ConfirmID = mysql_real_escape_string( trim( $_GET['CFid'] ) );

				if ($ConfirmID != '') {
					$m->ConfirmInvitation( $ConfirmID, $this->player->playerId );
					$m->dispose();
					$this->redirect( 'friends.php' );
					return null;
				}
			}


			if ($this->isPost()) {
				$post = array();
				$post['playerId1'] = $this->player->playerId;
				$post['myname'] = $this->data['name'];
				$post['playerName'] = (( isset( $_POST['playerName'] ) && $_POST['playerName'] != '' ) ? trim( $_POST['playerName'] ) : trim( $_POST['playerName'] ));

				if ($post['playerName'] != '') {
					$m->SendInvitation( $post );
				} 
else {
					echo '<pre> Error : Wrong name';
				}

				$m->dispose();
			}

			$this->friends = $m->GetFriends( $this->player->playerId, $this->pageIndex, $this->pageSize );
			$m->dispose();
		}

		function getNextLink() {
			$text = text_nextpage_lang . ' »';

			if ($this->pageIndex + 1 == $this->pageCount) {
				return $text;
			}

			$link = 'p=' . ( $this->pageIndex + 1 );
			$link = 'friends.php?' . $link;
			return '<a href="' . $link . '">' . $text . '</a>';
		}

		function getPreviousLink() {
			$text = '« ' . text_prevpage_lang;

			if ($this->pageIndex == 0) {
				return $text;
			}

			$link = '';

			if (0 < $this->pageIndex) {
				if ($link != '') {
					$link .= '&';
				}

				$link .= 'p=' . ( $this->pageIndex - 1 );
			}


			if ($link != '') {
				$link = '?' . $link;
			}

			$link = 'friends.php' . $link;
			return '<a href="' . $link . '">' . $text . '</a>';
		}
	}

	
	$p = new GPage();
	$p->run();
?>



