<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page;
        $page->nomPagina = "PcMig";
        $page->save();
        $page2 = new Page;
        $page2->nomPagina = "Cyberpuerta";
        $page2->save();
        $page3 = new Page;
        $page3->nomPagina = "DDTech";
        $page3->save();
        $page4 = new Page;
        $page4->nomPagina = "pcCel";
        $page4->save();
        $page5 = new Page;
        $page5->nomPagina = "MercadoLibre";
        $page5->save();
        $page6 = new Page;
        $page6->nomPagina = "Amazon";
        $page6->save();
    }
}
