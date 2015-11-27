<?php

namespace Controllers;

class HomeController extends MasterController {

    public function index(){

        $slug = array_pop($_GET);
        $slug = explode('/', trim($slug, '/'));
        $slug = array_pop($slug);

        $page = \Repository\Page::createInstance()
                ->selectAllPages();
        $this->view->page = $page;


        $content = \Repository\Page::createInstance()
                ->selectOneContent($slug);

        $this->view->slug = $content;

        $this->view->part('header');

        $this->view->showView();

        $this->view->part('footer');
    }


    public function page($slug) {

        $this->headerData();

        $page = \Repository\Page::createInstance()
            ->selectOneContent($slug);

        $this->view->page = $page;

        $this->view->showCustomView('Page');

        $this->view->part('footer');

    }


//    /**
//     * @GET
//     * @/slice/page/index/$slug=\w
//     * @AUTHORIZE
//     * @param $slug
//     */
//
//    public function pages($slug) {
//
//        $this->headerData();
//
//        $page = \Repository\Page::createInstance()
//            ->selectOneContent($slug);
//
//        $this->view->page = $page;
//
//        $this->view->showCustomView('Page');
//
//        $this->view->part('footer');
//    }


}
