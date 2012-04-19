<?php
/**
 * @author Chris Schalenborgh <chris.s@kryap.com>
 * @version 0.1
 */ 
 

$users = array(
	array('username' => 'User1', 'email' => 'user1@hotmail.com'),
	array('username' => 'User2', 'email' => 'user2@msn.com'),
	array('username' => 'User3', 'email' => 'user3@facebook.com'), 	
);


include('CampaignCommanderNMP.php');

$batch = new NMPBatch();

/* SEND MAILS */
foreach($users as $k=>$v) {
	/* CREATE NEW EMAIL */
	$email = new NMPMessage();
	$email->setEncryptToken('encrypt-token');
	$email->setRandomToken('random-token');
	$email->setNotificationId('notification-id');
	$email->setEmailRecipient($v['email']);
	
	$email->addDynamicValue('subject', 'Test subject for ' .$v['username']);
	$email->addDynamicValue('blaat', 'value');
	$email->removeDynamicValue('blaat');
	$email->addDynamicValue('username', $v['username']);
	$email->addDynamicValue('profileurl', 'http://www.website.com');
	
	//$email->setMailText('text mail goes here');
	$email->setMailHtml('<h1>Html mail for ' .$v['username']. '</h1><p>Lorem ipsum</p>');

	/* NOW ADD MAIL TO BATCH */
	$batch->addMessage($email);
}

/* SEND BATCH */
$batch->setDebug(true);
$batch = $batch->send();

echo '<pre>';
var_dump($batch);
echo '</pre>';
?>