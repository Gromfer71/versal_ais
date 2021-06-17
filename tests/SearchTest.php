<?php

use App\Models\Tour;
use App\Services\SearchService;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchTest extends TestCase
{
    public function test_search()
    {
        // берем заранее подготовленный тур, зная какие у него опции и отель
        $tour = Tour::find(1);

        /**
         * Вручную создаем входные данные для алгоритма фильтрации туров
         * здесь массив option состоит из одной опции с id = 1 из базы данных, как и hotel
         */
        $inputs = collect();
        $inputs->put('option', [1 => 1]);
        $inputs->put('hotel', [1 => 1]);

        // фильтруем все туры с симулированными входными данными
        $newTours = SearchService::search($inputs);
        // если алгоритм работает верно, на выходе мы должны получить массив всех отфильтрованных туров,
        // что мы сейчас и проверим ниже

        // создаем утверждение, в котором проверяем, что действительно в выходном массиве содержится наш тестируемый тур
        $this->assertTrue(in_array($tour->id, $newTours->pluck('id')->toArray()));
    }
}
