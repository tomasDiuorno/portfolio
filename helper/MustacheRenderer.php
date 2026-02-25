<?php

use Mustache\Engine;
use Mustache\Loader\FilesystemLoader;

class MustacheRenderer
{
    private $mustache;
    private $viewsFolder;

    public function __construct($partialsPathLoader)
    {
        $this->mustache = new Engine([
            'partials_loader' => new FilesystemLoader($partialsPathLoader)
        ]);

        $this->viewsFolder = $partialsPathLoader;
    }

    public function render($contentFile, $data = [])
    {
        echo $this->generateHtml(
            $this->viewsFolder . '/' . $contentFile . "Vista.mustache",
            $data
        );
    }

    public function generateHtml($contentFile, $data = [])
    {
        $header = file_get_contents($this->viewsFolder . '/header.mustache');
        $main   = file_get_contents($contentFile);
        $footer = file_get_contents($this->viewsFolder . '/footer.mustache');

        return $this->mustache->render($header . $main . $footer, $data);
    }
}