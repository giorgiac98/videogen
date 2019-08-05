<?php
    session_start();
    require_once 'connect.php';

    $user = $_POST['user'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    try{
        $sql = 'SELECT * FROM utenti WHERE username = ?';
		$query = $db->prepare($sql);
		$query->execute([$user]);
		if($query->rowCount() > 0){
			$_SESSION['useralreadyused'] = true;
			header("Location: ../signin.php");
	    }

	    $sql = 'SELECT * FROM utenti WHERE email = ?';
		$query = $db->prepare($sql);
		$query->execute([$email]);
		if($query->rowCount() > 0){
			$_SESSION['emailalreadyused'] = true;
			header("Location: ../signin.php");
	    }

	    $sql = 'INSERT INTO utenti (username, password, nome, cognome, indirizzo, telefono, email, admin)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$query = $db->prepare($sql);
	    if($query->execute([$user, $pass, $name, $surname, $address, $number, $email, false])){
	        $_SESSION['logged'] = 1;
			$_SESSION['user'] = $user;
	        header("Location: ../success.php");
	    }

    }
    catch (PDOException $e){
        echo $e->getMessage();
		echo "Yeah, this is an error. You will be redirected shortly.";
		sleep(5);
		header("Location: ../index.php");
    }
?>
