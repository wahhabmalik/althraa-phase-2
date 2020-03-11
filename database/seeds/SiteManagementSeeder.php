<?php

use Illuminate\Database\Seeder;

class SiteManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $site_meta_values = array([
            [
                "meta_key" => "title",
                "meta_value" => "Althraa",
            ],[
                "meta_key" => "description",
                "meta_value" => "Althraa helps you build your wealth",
            ],[
                "meta_key" => "logo",
                "meta_value" => 'backend_assets\site_assets\images\logo\logo@2x.png',
            ],[
                "meta_key" => "favicon",
                "meta_value" => 'backend_assets/site_assets/images/favicon/althraa_favicon.png',
            ],[
                "meta_key" => "maintenance_heading",
                "meta_value" => "We will be back soon! We are updating.",
            ],[
                "meta_key" => "maintenance_description",
                "meta_value" => "We are making better experience for you.",
            ],[
                "meta_key" => "maintenance_image",
                "meta_value" => 'backend_assets\site_assets\images\maintenance\maintenance.png',
            ],
        ]);

        foreach ($site_meta_values as $site_meta_value)
            DB::table('site_managements')->insert($site_meta_value);
    }
}
