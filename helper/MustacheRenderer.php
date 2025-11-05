<?php
class MustacheRenderer
{
    private $mustache;
    private $viewsFolder;

    public function __construct($partialsPathLoader){
        Mustache_Autoloader::register();
        $this->mustache = new Mustache_Engine(
            array(
                'partials_loader' => new Mustache_Loader_FilesystemLoader( $partialsPathLoader )
            ));
        $this->viewsFolder = $partialsPathLoader;
    }

    public function render($contentFile , $data = array() ){
        echo  $this->generateHtml(  $this->viewsFolder . '/' . $contentFile . "Vista.mustache" , $data);
    }

    public function generateHtml($contentFile, $data = array()) {
        $header = file_get_contents(  $this->viewsFolder .'/header.mustache');
        $main = file_get_contents( $contentFile );
        $footer = file_get_contents($this->viewsFolder . '/footer.mustache');

        return $this->mustache->render($header . $main . $footer, $data);
    }
}