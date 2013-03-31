<?php
/**
 * Criado por: Fabio C. Barrionuevo da Luz (github.com/luzfcb)
 * Data: 29/03/13
 * Horario: 13:11
 */


use tools\basemodels\InterfaceBaseModel;

class TwigViewBase{
    /**
     * @var Twig_Loader_Filesystem
     */
    private $loader;
    /**
     * @var Twig_Environment
     */
    protected $twig;
    /**
     * @var null|string
     */
    protected $template_dir;
    /**
     * @var array
     */
    protected $vars = array();

    function __construct($template_dir = null, $use_cache=true)
    {
        if ($template_dir !== null) {
            // Check here whether this directory really exists
            $this->template_dir = $template_dir;
        }
        else{
            $this->template_dir = $GLOBALS['APP_PATH'] . '/templates/';

        }
        $this->loader = new Twig_Loader_Filesystem($this->template_dir);

        if($use_cache == true){
            $this->twig = new Twig_Environment( $this->loader, array(
            'cache' => $GLOBALS['ROOT_PROJECT_PATH'] . '/tmp/cache',
            ));
        }
        else{
            $this->twig = new Twig_Environment( $this->loader );
        }

    }

    public function render($template_file) {
        if (file_exists($this->template_dir.$template_file)) {
            //include $template_file . $this->template_dir;
            $template_ = $this->template_dir.$template_file;
            //$this->prepare_parans();
            //echo $template_;
            $template = $this->twig->loadTemplate($template_file);
            $a = $this->preparar_parametros_dinamicos();

            $template->display($a);

        } else {
            throw new Exception('nao ha o arquivo de templates ' . $template_file . ' no diretorio  ' . $this->template_dir);
        }
    }
    public function render_by_parans($template_file, $parans) {

        if($parans instanceof InterfaceBaseModel){

        }
        if (file_exists($this->template_dir.$template_file)) {
            $template = $this->twig->loadTemplate($template_file);

            $template->display($parans);

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

    private function preparar_parametros_dinamicos(){
        $retorno = array();
        try {
            $array_keys_var = array_keys($this->vars);

            foreach ($array_keys_var as $chave) {
                $retorno[$chave] = $this->vars[$chave];
            }
        } catch (Exception $e) {

            echo $e->getTraceAsString();
        }
        return $retorno;
    }

}
