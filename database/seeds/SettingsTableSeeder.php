<?php

use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_title' => 'Blog',
            'site_subtitle' => 'Welcome to my blog!',
            'blog_author' => true,
            'blog_comments' => true,
        ]);
    }
}
