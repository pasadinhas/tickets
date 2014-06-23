<?php

class PlacesTableSeeder extends Seeder {

    public function run() {

        DB::table('places')->delete();

        DB::statement('ALTER TABLE places AUTO_INCREMENT = 1');

        foreach (range(1, 10) as $index) {
            Place::create(array(
                'name' => 'Place ' . $index,
                'acronym' => 'P' . $index
            ));
        }

    }
}