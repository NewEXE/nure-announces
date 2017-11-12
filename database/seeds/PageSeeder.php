<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
        $i = 1;
        while($i < 6)
        {
            Page::create(
                    [
                        'title' => 'Заголовок '.$i,
                        'content' => 'Контент страницы '.$i,
                        'alias' => 'alias'.$i,
                    ]
            );
            $i++;
        }
      */
    }

}
