<?php

namespace Controllers;

use Models\HallModel;

class HallController extends MasterController {

    public function createHall(\BindingModels\CreateHall $hall) {
        $this->headerData();

        $hallName = $hall->getHallName();
        $seating = $hall->getSeating();
        $venueId = $hall->getVenueId();

        $hall = new HallModel($seating, $venueId, $hallName);
        $hall->save();

        $this->view->showView();
        $this->view->part('footer');
        exit;
    }

}