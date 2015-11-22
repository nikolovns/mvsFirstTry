<?php

namespace Controllers;

use Models\HallModel;

class HallController extends MasterController {

    private function headerData() {
        session_start();
        $page = \Repository\Page::createInstance()
            ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
    }

    public function createHall(\BindingModels\CreateHall $hall) {
        $this->headerData();

        $hallName = $hall->getHallName();
        $seating = $hall->getSeating();
        $venueId = $hall->getVenueId();

        $hall = new HallModel($seating, $venueId, $hallName);
        $hall->save();

        $this->view->showView();
        exit;
    }

}