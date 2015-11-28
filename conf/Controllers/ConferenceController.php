<?php

namespace Controllers;

use BindingModels\CreateConference;
use Models\ConferenceModel;
use Models\VenueModel;
use Repository\Conference;
use Repository\Venue;

class ConferenceController extends MasterController {
//    /**
//     * @GET
//     * @ROUTE/conf/conferences/$showAll
//     */
//    public function all() {
//        $this->headerData();
//        $conf = Conference::createInstance()
//            ->selectAllConferencesDetails();
//
//        $this->view->conference = $conf;
//
//        $this->view->showView();
//
//        $this->view->part('footer');
//    }

    public function createConference(CreateConference $conference) {
        $this->headerData();
        $this->view->showView();

        if( $this->getSession()->getSessionParams('user') == null ) {
            $this->redirectControllers('user', 'index');
        }

        /**
         * get object property value
         * $this->getRequest()->getPost()->getPostParams()->name;
         */
        $venueName = $conference->getName();
        $venueAddress = $conference->getAddress();

        $confName = $conference->getConfName();
        $startDate = $conference->getStartDate();
        $endDate = $conference->getEndDate();
        $userId = $this->getSession()->getSessionParams('id');

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

        if($conference->getConfName() != null) {
            $this->getSession()->setSessionParams(['venue_id'=>$venueId, 'conferenceId'=>$confId]);

//            $user = \Repository\User::createInstance()
//                ->editUserId($userId);

            $this->redirectControllers('hall', 'createHall');
        }

        $this->view->part('footer');
        exit;
    }

    /**
     * @GET
     * @ROUTE/conf/conference/$id=\d
     * @param $id
     */
    public function conf($id) {
        $this->headerData();

        $conference = Conference::createInstance()
            ->selectConferenceById($id);

        $this->view->conference = $conference;

        $venue = Venue::createInstance()
            ->selectByConferenceId($id);

        $this->view->venue = $venue;

        $this->view->showCustomView('Conf');
        $this->view->part('footer');

    }


}