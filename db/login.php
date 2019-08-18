<?php
    session_start();
    if ((isset($_POST['user'])) && (isset($_POST['password']))){
		require_once 'connect.php';
		try {
			$sql = 'SELECT password, admin FROM utenti WHERE username = ?';
			$user = $_POST['user'];
			$pass = $_POST['password'];
			$query = $db->prepare($sql);
			$query->execute([$user]);

			if($query->rowCount() == 1){
				$res = $query->fetch();
				$dbpass = $res['password'];
				$isAdmin = $res['admin'];
				if (password_verify($pass, $dbpass)){
          unset($_SESSION['pdoex_error']);
					$_SESSION['user'] = $user;
					if ($isAdmin){
						$_SESSION['logged'] = 100;
						header("Location: ../admin.php");
					}
					else {
						$_SESSION['logged'] = 1;
						header("Location: ../index.php");
					}
				}
				else {
					$_SESSION['logged'] = -2;
		        	header("Location: ../signin.php");
				}
		    }else{
		        $_SESSION['logged'] = -1;
		        header("Location: ../signin.php");
		    }
		}
		catch(PDOException $e){
			echo $e->getMessage();
      $_SESSION['pdoex_error'] = $e->getMessage();
			echo "Yeah, this is an error. You will be redirected shortly.";
			sleep(5);
			header("Location: ../index.php");
		}

    }
    else{
    	header("Location: ../signin.php");
    }
?>
