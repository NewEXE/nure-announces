<?php

use Illuminate\Database\Seeder;
use App\Announce;

class AnnounceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announce::create([
            'title'=>'Пикник – Искры и канкан',
            'text'=>'<p>ИСКРЫ И КАНКАН (2017)</p><p>10 песен</p><ul><li><a href="http://piknik.info/lyrics/index/song/253">Лихие пришли времена</a></li><li><a href="http://piknik.info/lyrics/index/song/254">Злая кровь</a></li><li><a href="http://piknik.info/lyrics/index/song/255">Парню 90 лет</a></li><li><a href="http://piknik.info/lyrics/index/song/256">Последний из Могикан</a></li><li><a href="http://piknik.info/lyrics/index/song/257">Все хорошо!</a></li><li><a href="http://piknik.info/lyrics/index/song/258">Ты кукла из папье-маше</a></li><li><a href="http://piknik.info/lyrics/index/song/259">Большая игра</a></li><li><a href="http://piknik.info/lyrics/index/song/260">Принцесса</a></li><li><a href="http://piknik.info/lyrics/index/song/261">Зачем?</a></li><li><a href="http://piknik.info/lyrics/index/song/262">Ничего...</a></li></ul>',
            'created_at'=>'2017-09-28 17:10:02',
            'updated_at'=>'2017-09-28 17:10:02',
            'user_id'=>1,
        ]);
    }
}
