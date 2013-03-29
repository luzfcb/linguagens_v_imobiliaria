<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 13:11
 */


class View {
    protected $template_dir = 'templates/';
    protected $vars = array();
    protected $twig_instance;
    public function __construct($twig_instance, $template_dir = null) {
        if ($template_dir !== null) {
            // Check here whether this directory really exists
            $this->template_dir = $template_dir;
        }
        if ($twig_instance !== null){
            $this->$twig_instance = $twig_instance;
        }else{
            throw new Exception('instancia do Twig Nula');

        }
    }
    public function render($template_file, $params) {
        if (file_exists($this->template_dir.$template_file)) {
            //include $template_file . $this->template_dir;
            $template = $this->$twig_instance->loadTemplate($this->template_dir.$template_file);
            $template->display($params);
        } else {
            throw new Exception('nao ha o arquivo de templates ' . $template_file . ' no diretorio  ' . $this->template_dir);
        }
    }
    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    public function __get($name) {
        return $this->vars[$name];
    }
}
?>