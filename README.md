## About
> Campaign Commander™ Notification Messaging API Service: These APIs allow you to create and update Notification Messages and configure when they will be sent.

## php-campaigncommander-notifcation-messaging class
> php-campaigncommander-notifcation-messaging class is a PHP wrapper class for using the Campaign Commander™ Notification Messaging API Services. Download their docs for more info regarding this API. This wrapper class makes is easy to send mails through their email systems, using your favorite template, tracking all clicks, etc

## Methods

* setNotificationId (+ get)
> Set the ID of the template.

* setDebug (+ get)
> Set debug mode. True for returning API output. False for just true/false.

* setEncryptToken (+ get)
> Set the encrypt value provided in the interface.

* setRandomToken (+ get)
> Set the random value provided for the template.

* setSyncType (+ get)
> Set the type of synchronization that should be carried out (NOTHING / INSERT / UPDATE / INSERT_UPDATE).

* setEmailTime (+ get)
> Set the time you wish to send the notification message. If you put a past time, it will be sent immediately.

* setEmailRecipient (+ get)
> Set the email address to which you wish to send the notification message

* addDynamicValue
> Adds a value to the 'dynamic personalization parameters' array. Use this for setting the subject, sender name, etc.

* removeDynamicValue
> Remove a value from the 'dynamic personalization parameters' array.

* returnDynamicValues
> Get a list of all defined dynamic values.

* setMailHtml (+ get)
> Set the HTML mail content. Key = 1

* setMailText (+ get)
> Set the Text mail content. Key = 2

* send
> Send the message to the API.