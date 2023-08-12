<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryArray = [
            ['name' => 'Kleding', 'icon' => '👕'],
            ['name' => 'Schoenen', 'icon' => '👞'],
            ['name' => 'Accessoires', 'icon' => '🕶️'],
            ['name' => 'Electronica', 'icon' => '📱'],
            ['name' => 'Meubels', 'icon' => '🛋️'],
            ['name' => 'Huis en Tuin', 'icon' => '🏡'],
            ['name' => 'Sport en Vrije tijd', 'icon' => '⚽'],
            ['name' => 'Boeken en Tijdschriften', 'icon' => '📚'],
            ['name' => 'Auto\'s en Voertuigen', 'icon' => '🚗'],
            ['name' => 'Muziekinstrumenten', 'icon' => '🎸'],
            ['name' => 'Keukenapparatuur', 'icon' => '🍳'],
            ['name' => 'Fietsen', 'icon' => '🚴'],
            ['name' => 'Speelgoed', 'icon' => '🧸'],
            ['name' => 'Kunst en Antiek', 'icon' => '🎨'],
            ['name' => 'Gezondheid en Beauty', 'icon' => '💄'],
            ['name' => 'Computers en Laptops', 'icon' => '💻'],
            ['name' => 'Televisies', 'icon' => '📺'],
            ['name' => 'Smartwatches', 'icon' => '⌚'],
            ['name' => 'Kampeeruitrusting', 'icon' => '🏕️'],
            ['name' => 'Tuinmeubilair', 'icon' => '🌿'],
            ['name' => 'Baby en Kinderen', 'icon' => '👶'],
            ['name' => 'Horloges', 'icon' => '⌚'],
            ['name' => 'Sieraden', 'icon' => '💍'],
            ['name' => 'Campinguitrusting', 'icon' => '🏕️'],
            ['name' => 'Tuinieren', 'icon' => '🌱'],
            ['name' => 'Elektrisch gereedschap', 'icon' => '🛠️'],
            ['name' => 'Dierenaccessoires', 'icon' => '🐾'],
            ['name' => 'Hobby en Knutselen', 'icon' => '🎨'],
            ['name' => 'Verzamelobjecten', 'icon' => '🔮'],
            ['name' => 'Woondecoratie', 'icon' => '🏠'],
            ['name' => 'Muziek en Vinyl', 'icon' => '🎶'],
            ['name' => 'Vakanties en Reizen', 'icon' => '✈️'],
            ['name' => 'Keukengerei', 'icon' => '🍽️'],
            ['name' => 'Gadgets', 'icon' => '🔌'],
            ['name' => 'Tassen', 'icon' => '👜'],
            ['name' => 'Cadeaus', 'icon' => '🎁'],
            ['name' => 'Fitnessapparatuur', 'icon' => '🏋️'],
            ['name' => 'Kookboeken', 'icon' => '📖'],
            ['name' => 'Vervoersmiddelen', 'icon' => '🛴'],
            ['name' => 'Gaming', 'icon' => '🎮'],
            ['name' => 'Kunstnijverheid', 'icon' => '✂️'],
            ['name' => 'Camera\'s', 'icon' => '📷'],
            ['name' => 'Bouwmateriaal', 'icon' => '🏗️'],
            ['name' => 'Film en DVD\'s', 'icon' => '🎬'],
            ['name' => 'Verlichting', 'icon' => '💡'],
            ['name' => 'Planten en Bloemen', 'icon' => '🌼'],
            ['name' => 'Keukengerei', 'icon' => '🍽️'],
            ['name' => 'Huisdieren', 'icon' => '🐶'],
            ['name' => 'Horloges', 'icon' => '⌚'],
            ['name' => 'Kampeeruitrusting', 'icon' => '🏕️'],
            ['name' => 'Tuinmeubilair', 'icon' => '🌿'],
            ['name' => 'Baby en Kinderen', 'icon' => '👶'],
            ['name' => 'Horloges', 'icon' => '⌚'],
            ['name' => 'Sieraden', 'icon' => '💍'],
            ['name' => 'Campinguitrusting', 'icon' => '🏕️'],
            ['name' => 'Tuinieren', 'icon' => '🌱'],
            ['name' => 'Elektrisch gereedschap', 'icon' => '🛠️'],
            ['name' => 'Dierenaccessoires', 'icon' => '🐾'],
            ['name' => 'Hobby en Knutselen', 'icon' => '🎨'],
            ['name' => 'Verzamelobjecten', 'icon' => '🔮'],
            ['name' => 'Woondecoratie', 'icon' => '🏠'],
            ['name' => 'Muziek en Vinyl', 'icon' => '🎶'],
            ['name' => 'Vakanties en Reizen', 'icon' => '✈️'],
            ['name' => 'Keukengerei', 'icon' => '🍽️'],
            ['name' => 'Gadgets', 'icon' => '🔌'],
            ['name' => 'Tassen', 'icon' => '👜'],
            ['name' => 'Cadeaus', 'icon' => '🎁'],
            ['name' => 'Fitnessapparatuur', 'icon' => '🏋️'],
            ['name' => 'Kookboeken', 'icon' => '📖'],
            ['name' => 'Vervoersmiddelen', 'icon' => '🛴'],
            ['name' => 'Gaming', 'icon' => '🎮'],
            ['name' => 'Kunstnijverheid', 'icon' => '✂️'],
            ['name' => 'Camera\'s', 'icon' => '📷'],
            ['name' => 'Bouwmateriaal', 'icon' => '🏗️'],
            ['name' => 'Film en DVD\'s', 'icon' => '🎬'],
            ['name' => 'Verlichting', 'icon' => '💡'],
            ['name' => 'Planten en Bloemen', 'icon' => '🌼'],
            // ... Voeg nog meer categorieën toe ...
        ];

        foreach ($categoryArray as $tag) {
            DB::table('categories')->insert([
                'name' => $tag['name'],
                'icon' => $tag['icon'],
                'color' => rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255)
            ]);
        }
    }
}
