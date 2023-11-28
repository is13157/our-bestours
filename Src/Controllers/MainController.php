<?php

namespace Src\Controllers;

use MiladRahimi\PhpRouter\View\View;
use ORM;

class MainController
{
    public function indexPage(View $view)
    {
        $tour = ORM::for_table('tour')->find_many();

        return $view->make('index', [
            'tours' => $tour
        ]);
    }

    public function detailPage(View $view, int $id)
    {
        $tour = ORM::for_table('tour')->find_one($id);
        $features = ORM::for_table('features')->where('tour_id', $id)->find_many();
        $programs = ORM::for_table('programm')->where('tour_id', $id)->find_many();
        return $view->make('detail-page',[
            'tour' => $tour,
            'features' => $features,
            'programs' => $programs
        ]);
    }

}