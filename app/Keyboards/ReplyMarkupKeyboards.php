<?php

namespace App\Keyboards;

use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;

class ReplyMarkupKeyboards
{

    public static function mainMenu(): ReplyKeyboardMarkup
    {
        return ReplyKeyboardMarkup::make()->addRow(
            KeyboardButton::make('fds'),
            KeyboardButton::make('Give me animal!')
        );
    }

}