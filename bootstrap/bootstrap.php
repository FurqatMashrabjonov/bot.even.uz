<?php

use App\Helpers\Catalogs;
use App\Keyboards\ReplyMarkupKeyboards;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\RunningMode\Webhook;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\WebApp\WebAppInfo;


$bot = new Nutgram($config['token']);

$bot->setRunningMode(Webhook::class);

$bot->onCommand('start', function (Nutgram $bot) {
    $bot->sendMessage(
        text: 'Добро пожаловать в бот even.uz',
        reply_markup: ReplyMarkupKeyboards::mainMenu()
    );
});

$bot->onText('ℹ️О Компании', function (Nutgram $bot) {
    $bot->sendMessage(
        text: 'https://telegra.ph/O-Kompanii-10-08-2',
        reply_markup: InlineKeyboardMarkup::make()
            ->addRow(
                InlineKeyboardButton::make('Open', web_app: WebAppInfo::make('https://telegra.ph/O-Kompanii-10-08-2'))
            )
    );
});


$bot->onText('📞Связаться', function (Nutgram $bot) {
    $bot->sendMessage(
        text: '📞 71 200 15 05
📩 33 100 15 05
🌐 www.even.uz
🔗https://www.instagram.com/even.uz/',
    );
});

$bot->onText('📪Наш адрес', function (Nutgram $bot) {
    $bot->sendLocation(
        latitude: 41.382128,
        longitude: 69.294766
    );
});

$bot->onText('📒Каталог', function (Nutgram $bot) {
   $bot->sendMessage(
       text: 'Наши каталоги',
       reply_markup: ReplyMarkupKeyboards::catalogs()
   );
});

$bot->onText('🖼Примеры', function (Nutgram $bot) {
    $bot->sendMessage(
        text: 'Примеры наших работ',
           reply_markup: ReplyMarkupKeyboards::examples()
    );
});

//catalogs clicked

$bot->onCallbackQueryData('catalog:(\d+)', function (Nutgram $bot, $id) {
    $bot->editMessageReplyMarkup(
        reply_markup: ReplyMarkupKeyboards::subCatalogs($id)
    );
});

$bot->onCallbackQueryData('back', function (Nutgram $bot) {
    $bot->editMessageReplyMarkup(
        reply_markup: ReplyMarkupKeyboards::catalogs()
    );
});

$bot->onCallbackQueryData('next_examples:(\d+)', function (Nutgram $bot, $page) {
    $bot->editMessageReplyMarkup(
        reply_markup: ReplyMarkupKeyboards::examples((int)$page)
    );
});

$bot->run();