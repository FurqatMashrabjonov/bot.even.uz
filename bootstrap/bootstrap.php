<?php

use App\Keyboards\ReplyMarkupKeyboards;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\RunningMode\Webhook;



$bot = new Nutgram($config['token']);

$bot->setRunningMode(Webhook::class);

$bot->onCommand('start', function (Nutgram $bot) {
    $bot->sendMessage(
        text: 'Hello, I am a bot!',
        reply_markup: ReplyMarkupKeyboards::mainMenu()
    );
});

$bot->run();
