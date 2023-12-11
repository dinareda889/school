<?php


class LanguageSwitcher extends CI_Controller
{


    public function __construct() {
        parent::__construct();
    }
    function switchLang($language = "") {
        $language = (!empty($language)) ? $language : "english";
        $this->session->set_userdata('set_lang', $language);
        $this->session->set_userdata('site_lang', $language);
        
        redirect($_SERVER['HTTP_REFERER']);

        /*$this->session->set_userdata('site_lang', $language);
        header('Location: http://localhost/ci_multilingual_app/');*/
    }


}
