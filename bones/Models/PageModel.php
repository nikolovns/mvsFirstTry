<?php

namespace Models;

class PageModel {
    
    protected $id;
    protected $label;
    protected $title;
    protected $body;
    protected $slug;
    
    function __construct($label, $title, $body, $slug, $id = null) {
        $this->id = $id;
        $this->label = $label;
        $this->title = $title;
        $this->body = $body;
        $this->slug = $slug;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setBody($body) {
        $this->body = $body;
    }

    function setSlug($slug) {
        $this->slug = $slug;
    }
    
    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function getTitle() {
        return $this->title;
    }

    function getBody() {
        return $this->body;
    }

    function getSlug() {
        return $this->slug;
    }

}
