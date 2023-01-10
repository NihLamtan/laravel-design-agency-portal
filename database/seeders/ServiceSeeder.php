<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;



class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'category_id' => 1,
            'name' => 'Logo & business card',
            'slug' => 'logo-design-and-identity',
            'price' => 599,
            'features' => ["Logo", "Business Card", "Letterhead & Envelope", "Facebook Cover"],
            'meta_title' => '-',
            'meta_description' => '-',
            'plan' => '-',
            'description' => '-',
            'image_upload' => '-',  
        ]);
    }
}
