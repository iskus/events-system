<?php
spl_autoload_register(function ($className) {
    require_once $className . '.php';
});

function test($tag, $data)
{
    EventProcessor::init($tag, $data);
}

$blockBookData = [
    'moder_id' => 1,
    'author_id' => 2,
    'book_id' => 3,
    'comment' => 'hgdmgm  kht dkdj',
];
$loginWarningData = ['user_id' => 5, 'subject' => 'Wron Pass'];
$ticketData = [
    'user_id' => 76,
    'sum' => 8788,
    'currency' => 'USD',
    'account' => 'jhchghgjjgc',
];
test('book.block', $blockBookData);
test('login.warning', $loginWarningData);
test('ticket.created', $ticketData);

$eventManager = new EventManager;
$eventManager->attach('book.block', function() use ($blockBookData) { echo "system user / "; });
$eventManager->attach('login.warning', function() use ($loginWarningData) { echo "email user / "; });
$eventManager->attach('ticket.created', function() use ($ticketData) { echo "email admin / "; });
$eventManager->attach('ticket.created', function() use ($ticketData) { echo "email user / "; });
$eventManager->trigger('login.warning');
$eventManager->trigger('book.block');
$eventManager->trigger('ticket.created');