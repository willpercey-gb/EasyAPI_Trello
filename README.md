![EasyMail](https://uwebpro.com/images/logo_small.jpg)
# EasyAPI Trello
### https://easyapi.uwebpro.com/trello
## Built
EasyAPI Trello is currently in Development phase, it can currently be used to create cards.
## Class Features
EasyAPI Trello Class offers a quick and easy method of automating Trello for your business. Easily create, populate & manage workflows.

## How to use
#### Get Usage Token (Set up)
Using the following you will be redirected to Trello. Login and trello will provide you with a token copy this token, then you no longer need this code.
```php
require 'EasyTrello.php';

$trello = new EasyTrello;

$apiKey = ''; /* @TODO Add API Key */

$trello->getToken($apiKey);
```

#### Create Card
```php
require 'EasyTrello.php';

$trello = new EasyTrello;

$apiKey = '';
$token = '';

$trello->setToken($apiKey, $token);

$cardName = '';
$cardDescription = '';
$listID = '';
$labelID = '';
//$cardPosition = 'bottom';
$cardPosition = 'top';

$trello->createCard($cardName, $cardDescription, $listID, $labelID, $cardPosition);

var_dump($trello->response); 
```
