<?php

use App\Mouve;
use Illuminate\Database\Seeder;

class MouvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $artiste = new Mouve();
        $artiste->id = 1;
        $artiste->description = "Booba - PGP (Clip Officiel)";
        $artiste->url_video = "	https://www.youtube.com/watch?v=3egagRvougI";
        $artiste->is_youtube = 0;
        $artiste->artiste_id = 1;
        $artiste->save();

        $artiste = new Mouve();
        $artiste->id = 2;
        $artiste->description = "Reine (Clip Officiel)";
        $artiste->url_video = "https://youtu.be/tVKaN_H35xs";
        $artiste->is_youtube = 0;
        $artiste->artiste_id = 2;
        $artiste->save();

        $artiste = new Mouve();
        $artiste->id = 3;
        $artiste->description = "Sidiki Diabaté- Qu'est-ce que je t'ai fait BB";
        $artiste->url_video = "https://youtu.be/fYcMY8QcjT8";
        $artiste->is_youtube = 0;
        $artiste->artiste_id = 3;
        $artiste->save();

        $artiste = new Mouve();
        $artiste->id = 4;
        $artiste->description = "Vegedream, Instagram ft. Joé Dwet Filé";
        $artiste->url_video = "https://youtu.be/xZx3LDukUdA";
        $artiste->is_youtube = 0;
        $artiste->artiste_id = 4;
        $artiste->save();


    }

}
