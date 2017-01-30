<?php

use Illuminate\Database\Seeder;
use App\Banner;
class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bigBanner = new Banner();
        $bigBanner->name = 'Large banner - welcome page';
        $bigBanner->width = 300;
        $bigBanner->height = 600;
        $bigBanner->save();

        $wideBanner = new Banner();
        $wideBanner->name = 'Wide banner - welcome page';
        $wideBanner->width = 728;
        $wideBanner->height = 90;
        $wideBanner->save();

        $squareBanner1 = new Banner();
        $squareBanner1->name = 'Square banner 1- projects page';
        $squareBanner1->width = 300;
        $squareBanner1->height = 250;
        $squareBanner1->save();

         $squareBanner2 = new Banner();
        $squareBanner2->name = 'Square banner 2- projects page';
        $squareBanner2->width = 300;
        $squareBanner2->height = 250;
        $squareBanner2->save();
    }

}
