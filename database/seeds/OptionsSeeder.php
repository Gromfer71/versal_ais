<?php

use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    public $data = [
        ['name' => 'Кондиционер', 'price' => 500],
        ['name' => 'Кондиционер', 'price' => 500],
        ['name' => 'Кондиционер', 'price' => 500],
        ['name' => 'Кондиционер', 'price' => 500],
        ['name' => 'Кондиционер', 'price' => 500],
    ];

    public function run()
    {
        $data = collect($this->data);
        $data->each(function ($item) {
            \App\Models\Option::create($item);
        });

    }
}
