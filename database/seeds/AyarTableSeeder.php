<?php

use Illuminate\Database\Seeder;
use App\Ayar;

class AyarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ayar::create(['name' => 'baslik', 'value' => 'Gıdacıyım']);
        Ayar::create(['name' => 'author', 'value' => 'Samet SELKİ']);
        Ayar::create(['name' => 'aciklama', 'value' => 'Sağlıklı Beslenme']);
        Ayar::create(['name' => 'keywords', 'value' => 'sağlık,beslenme,gıdalar']);
        Ayar::create(['name' => 'facebook', 'value' => 'https://www.facebook.com/']);
        Ayar::create(['name' => 'twitter', 'value' => 'https://twitter.com/login?lang=tr']);
        Ayar::create(['name' => 'github', 'value' => 'https://github.com/']);
        Ayar::create(['name' => 'copyright', 'value' => '&copy; gidaciyim.com - Tüm Hakları Saklıdır']);
    }
}
