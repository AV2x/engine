<?php

namespace App\Helpers;


class DateOrder {

    const month = [
        '01' => 'янв.',
        '02' => 'фев.',
        '03' => 'мар.',
        '04' => 'апр.',
        '05' => 'мая.',
        '06' => 'июн.',
        '07' => 'июл.',
        '08' => 'авг.',
        '09' => 'сен.',
        '10' => 'окт.',
        '11' => 'ноя.',
        '12' => 'дек.',
    ];

    static public function convert($date)
    {
        if (date('d.m.Y', strtotime($date)) == date('d.m.Y')) {
            return 'Сегодня ' . date('H:i', strtotime($date));
        }
        if (date('d.m.Y', strtotime($date)) == (new \DateTime())->modify('-1 days')->format('d.m.Y')) {
            return 'Вчера ' . date('H:i', strtotime($date));
        }
        return date('d', strtotime($date)).' '.self::month[date('m', strtotime($date))].' '.date('H:i', strtotime($date));
    }
}
