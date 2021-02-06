<?php
function goToDashboard()
{
header("location: ./dashboard.php?action=loginSuccess");
}

function redirectFunct()
{
header("location: ./index.php");
}

function redirectFunctPwdSame()
{
header("location: ./signup.php?action=pwdisnull");
}

function goToIndex()
{
header("location: ./index.php");
}

function logOut($session){


}

function redirectFunctNotRegistered(){
	header("location: ./index.php?action=pleaseRegisterBoss");
}
?>