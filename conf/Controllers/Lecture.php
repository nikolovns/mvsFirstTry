<?php


namespace Controllers;

use Models\HallModel;
use Models\LectureModel;
use Repository\Hall;

class LectureController extends MasterController {

    private function headerData() {
//        session_start();
        $page = \Repository\Page::createInstance()
            ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
    }

    public function createLecture(\BindingModels\CreateLecture $lecture) {
//        session_start();
        $this->headerData();
        $this->view->showView();

//var_dump($lecture);
        /*
         * TODO
         * Conference ->
         * get conference date
         * add this date in option list
         * the user has to choose date for every lecture
         * get hall name -> add all halls in option list
         */

        $lectureName = $lecture->getName();
        $startTime = $lecture->getStartTime();
        $endTime = $lecture->getEndTime();
        $lectureBreak = $lecture->getBreak();
        $lectureDay = $lecture->getDay();
        $hallName = $lecture->getHallName();
        $confId = $lecture->getIdConference();

        $hall = \Repository\Hall::createInstance()
            ->getHallIdByConference($confId, $hallName);

        $hallId = $hall['id'];

        $lecture = new LectureModel($lectureName, $startTime, $endTime, $lectureBreak, $hallId, $confId, $lectureDay);

        $lecture->save();
        exit;
    }

    /**
     * @GET
     * @ROUTE/conf/confer/$id=\d
     */
    public function get($id) {

        $lecture = \Repository\Lecture::createInstance()
            ->getLectureDetailsByConferenceId($id);

        var_dump($lecture);
    }


}