<?php

class TicketsTableSeeder extends Seeder {

    public function run() {

        DB::table('tickets')->delete();

        DB::statement('ALTER TABLE tickets AUTO_INCREMENT = 1');

        foreach (range(1, 35) as $index) {
            Ticket::create(array(
                'code' => sprintf('%02d', $index % 10 + 1),
                'place_id' => ($index * 3) % 10 + 1
            ));
        }

    }
}