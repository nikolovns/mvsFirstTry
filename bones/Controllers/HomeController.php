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

}
