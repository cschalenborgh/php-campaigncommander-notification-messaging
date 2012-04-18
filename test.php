<?php
/**
 * @author Chris Schalenborgh <chris.s@kryap.com>
 * @version 0.1
 */ 
 
include('CampaignCommanderNM.php');

$ev = new CampaignCommanderNM();
$ev->setEncryptToken('encrypt-token');
$ev->setRandomToken('random-token');
$ev->setNotificationId('notification-id');
$ev->setEmailRecipient('user@email.com');

$ev->addDynamicValue('subject', 'Test subject');
$ev->addDynamicValue('blaat', 'value');
$ev->addDynamicValue('username', 'Administrator');
$ev->addDynamicValue('profileurl', 'http://www.website.com');
$ev->removeDynamicValue('blaat');


//$ev->setMailText('text mail goes here');
$ev->setMailHtml('<h1>Html mail</h1><p>Lorem ipsum</p>');
$ev->setDebug(true);

$go = $ev->send();

echo '<pre>';
print_r($go);
echo '</pre>';
?>