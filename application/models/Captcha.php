<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {

    public function index()
    {
        $this->load->helper('captcha');
        // print_r(base_url());die();
        $config = array(
            'img_path'      => './captcha/',
            'img_url'       => base_url().'captcha/',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 6,
            'font_size'     => 16,
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        );

        $captcha = create_captcha($config);

        $this->session->set_userdata('captcha', $captcha['word']);

        echo $captcha['image'];
    }

}
