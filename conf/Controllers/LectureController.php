<?php


namespace Controllers;

use Models\LectureModel;

class LectureController extends MasterController {

    public function createLecture(\BindingModels\CreateLecture $lecture) {
        $this->headerData();
        $this->view->showView();

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
     * @ROUTE/conf/lecture/$id=\d
     */
    public function get($id) {

        $this->headerData();
        $lecture = \Repository\Lecture::createInstance()
            ->getLecturesById($id);
        var_dump($lecture);
        $this->view->showView();
    }


}