<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SeoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запуск сео оптимизации';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $b = 4999549;
        for ($i = 0; $i <= 5242145; $i++){
            $b = $b +$i;
            $this->line("Бот ".$b." зашел на сайт");
            usleep(100000);
        }
//        $line = 70;
//        $this->newLine($line);
//        $this->line('Начинается СЕО оптимизация');
//        $this->output->progressStart(522264);
//        sleep(1);
//        system('clear');
//
//        $this->newLine($line);
//        $this->line('Начинается СЕО оптимизация.');
//        $this->output->progressStart(522264);
//        sleep(1);
//        system('clear');
//
//        $this->newLine($line);
//        $this->line('Начинается СЕО оптимизация...');
//        $this->output->progressStart(522264);
//        sleep(1);
//        system('clear');
//
//        $this->newLine($line);
//        $this->line('Начинается СЕО оптимизация....');
//        $this->output->progressStart(522264);
//        sleep(1);
//        system('clear');
//
//        $this->newLine($line);
//        $this->line('Начинается СЕО оптимизация.....');
//        $this->output->progressStart(522264);
//
//        $array = [
//            [
//                "Запрос: <fg=blue>Аренда машины</>",
//                'Посещений: <fg=green>606 565 пос/мес</>',
//                'Конкуренция: <fg=red>Опасная</>',
//                'Сроки: <fg=green> < 1 год.</>',
//                '<fg=blue>Ищу другой запрос</>',
//            ],
//            [
//                "Запрос: <fg=blue>Аренда авто</>",
//                'Посещений: <fg=green>606 565 пос/мес</>',
//                'Конкуренция: <fg=red>Опасная</>',
//                'Сроки: <fg=green> < 1 год.</>',
//                //'<fg=green>Оптимизирую под услугу "Строительство каркасного дома"</>'
//            ],
//            [
//                "Запрос: <fg=blue>Аренда авто в Москве</>",
//                'Посещений: <fg=green>41 193 пос/мес</>',
//                'Конкуренция: <fg=red>Сильная</>',
//                'Сроки: <fg=green> < 5 мес.</>',
//            ],
//            [   "Запрос: <fg=blue>Аренда премиум авто в Москве</>",
//                'Посещений: <fg=blue>696 пос/мес</>',
//                'Конкуренция: <fg=green>Слабая</>',
//                'Сроки: <fg=green> 1 нед.</>',
//                '<fg=green>Оптимизирую Категорию "Премиум" под аренда премиум авто в Москве</>'
//            ],
//            [   "Запрос: <fg=blue>Аренда mercedes</>",
//                'Посещений: <fg=green>3 191 пос/мес</>',
//                'Конкуренция: <fg=green>Оптимальная</>',
//                'Сроки: <fg=green> 3 нед.</>',
//            ],
//        ];
//
//        $newArray = [];
//
//        for($i = 0; $i < 10445; $i++ )
//        {
//            $newArray=  array_merge($newArray, $array);
//        }
//
//
////        foreach ($array as $item) {
////            usleep(2500000);
////            $this->newLine($line);
////            foreach ($item as $i){
////                $this->line($i);
////            }
////            $this->newLine(1);
////            $this->output->progressAdvance();
////
////        }
//        foreach ($newArray as $item) {
//            usleep(1);
//            $this->newLine($line);
//            foreach ($item as $i){
//                $this->line($i);
//            }
//            $this->newLine(1);
//            $this->output->progressAdvance();
//
//        }
//
//
//        $this->output->progressFinish();

    }
}
