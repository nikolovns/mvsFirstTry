<?php

namespace Controllers;

use BindingModels\CreateConference;
use Models\ConferenceModel;
use Models\VenueModel;
use Repository\Conference;

class ConferenceController extends MasterController {

    private function headerData() {
        session_start();
        $page = \Repository\Page::createInstance()
            ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
    }

    /**
     * @GET
     * @ROUTE/conf/conf/$show
     */
    public function all($show) {
        $this->headerData();
        $conf = Conference::createInstance()
            ->selectAllConferencesDetails();

        $this->view->conference = $conf;

        $this->view->showView();

        $this->view->part('footer');
    }


    public function createConference(CreateConference $conference) {
        $this->headerData();
        $this->view->showView();

        $venueName = $conference->getName();
        $venueAddress = $conference->getAddress();

        $confName = $conference->getConfName();
        $startDate = $conference->getStartDate();
        $endDate = $conference->getEndDate();
        $userId = $_SESSION['id'];


        /**
         * this part added venue's data
         */
        $venue = new VenueModel($venueName, $venueAddress);
        $venue->save();

        $venueId = \Repository\Venue::createInstance()
            ->selectId();
        $conference = new ConferenceModel($confName, $startDate, $endDate, $venueId, $userId);

        $conference->save();

        $conf = Conference::createInstance()
            ->selectAllConferencesDetails();

        $confId = array_pop($conf);
        $confId = $confId->getId();
//        $confId = array_pop($conf['id']);

        if($conference->getConfName() != null) {
//            var_dump($venueId);
            $_SESSION['venue_id'] = $venueId;
            $_SESSION['conferenceId'] = $confId;

            $user = \Repository\User::createInstance()
                ->editUserId($userId);

            $this->redirectControllers('hall', 'createHall');
        }

        $this->view->part('footer');
        exit;
    }


}