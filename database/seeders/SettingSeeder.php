<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Setting seeder
        set_static_option('address', 'Bashundhara extension road, Ka - 30, 2/1 Kuwaiti Mosque Rd,  Dhaka 1212, Dhaka Division, Bangladesh');
        set_static_option('mobile', '+8801762522594');
        set_static_option('email', 'motorcorporation.bd@gmail.com');
        set_static_option('line1', 'Mon - Fri');
        set_static_option('time1', '09am to 06pm');
        set_static_option('video1', 'https://www.youtube.com/embed/8oIdYqW-PfE');
        set_static_option('title1', 'Meet the Billionaire of California !!!');
        set_static_option('video2', 'https://www.youtube.com/embed/fCijcT_U8j4');
        set_static_option('title2', 'GARAGE UPDATE 2.0! || Manny Khoshbin');
        set_static_option('video3', 'https://www.youtube.com/embed/e_W0vY_BhFI');
        set_static_option('title3', 'IM OFFICIALY BUYING A BUGATTI BOLIDE!');
    }
}
