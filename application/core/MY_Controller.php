<?php

class MY_Controller extends CI_Controller {

    private $default_navbar = "partial/default_nav";
    private $default_footer = "partial/default_footer";
    private $default_layout = "layout";
    private $content_navbar = "";
    private $content_footer = "";

    public function __construct() {
        parent::__construct();
        // set default layout
        $this->setNavbar();
        $this->setFooter();
    }

    public function render($view_data) {
        $data["navbar"] = $this->content_navbar;
        $data["footer"] = $this->content_footer;
        $data["content"] = $view_data;
        $this->load->view($this->default_layout, $data);
    }

    public function setLayout($layout_name) {
        $this->default_layout = $layout_name;
    }

    public function setNavbar($viewName = "", $data = NULL) {
        if ($viewName == "") {
            $viewName = $this->default_navbar;
        }
        $this->content_navbar = $this->loadView($viewName, $data);
    }

    public function setFooter($viewName = "", $data = NULL) {
        if ($viewName == "") {
            $viewName = $this->default_footer;
        }
        $this->content_footer = $this->loadView($viewName, $data);
    }

    public function loadView($viewName, $data = NULL) {
        return $this->load->view($viewName, $data, TRUE);
    }
    
    public function requireAdmin(){
        if($this->session->userdata("admin") == ""){
            redirect("Staff/Admin/signin");
        }
    }

}
