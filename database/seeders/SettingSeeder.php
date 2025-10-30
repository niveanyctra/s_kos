<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('images/logo.png');
        $fileName = 'logo.png';
        $destinationPath = 'images/' . $fileName;

        Storage::makeDirectory('images');

        if (File::exists($sourcePath)) {
            $fileContent = File::get($sourcePath);
            Storage::put($destinationPath, $fileContent);
        }

        DB::table('settings')->insert([
            [
                'name' => "S'Kos",
                'description' => 'Tempat tinggal nyaman dan bersih untuk pelajar, mahasiswa dan pekerja.',
                'address' => 'Tugu Dalam, Kota Cirebon',
                'location_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.6334374671105!2d108.54713075946957!3d-6.75338635229618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1761809754997!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'phone' => '+6285175258106',
                'email' => 'skos@example.com',
                'logo_path' => $destinationPath,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
