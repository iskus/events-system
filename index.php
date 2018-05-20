<?php
spl_autoload_register(function ($className) {
    require_once $className . '.php';
});

function test($tag, $data)
{
    EventProcessor::init($tag, $data);
}

test('book.block', [
    'moder_id' => 1,
    'author_id' => 2,
    'book_id' => 3,
    'comment' => 'hgdmgm  kht dkdj',
]);
test('login.warning', ['user_id' => 5, 'subject' => 'Wron Pass']);
test('ticket.created', [
    'user_id' => 76,
    'sum' => 8788,
    'currency' => 'USD',
    'account' => 'jhchghgjjgc',
]);