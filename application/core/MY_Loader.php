<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * My Loader Class
 *
 * Loads framework components.
 *
 * @subpackage	Libraries
 * @category	Loader
 */
class MY_Loader extends CI_Loader {

  public function template($template_name, $vars = [], $return = FALSE)
  {
    $CI =& get_instance();
    if ($CI->session->userdata('usuario')) {
        $vars['usuario'] = $CI->session->userdata('usuario');
    }

    $vars['classe'] = $CI->router->fetch_class();

    if ($return)
    {
      $content  = $this->view('templates/header', $vars, $return);
      $content .= $this->view($template_name, $vars, $return);
      $content .= $this->view('templates/footer', $vars, $return);

      return $content;
    }

    $this->view('templates/header', $vars);
    $this->view($template_name, $vars);
    $this->view('templates/footer', $vars);
  }
}