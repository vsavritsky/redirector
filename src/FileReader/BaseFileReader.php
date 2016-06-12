<?php
namespace Vsavritsky\Redirector\FileReader;

use SplFileInfo;

class BaseFileReader implements FileReaderInterface
{
    protected $extensions = [];

    public function checkCorrectFormatFile(SplFileInfo $file)
    {
        if (in_array($file->getExtension(), $this->extensions)) {
            return true;
        }

        return false;
    }

    public function getListToRedirects(SplFileInfo $file) {

    }
}
