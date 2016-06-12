<?php
namespace Vsavritsky\Redirector\FileReader;

use SplFileInfo;

interface FileReaderInterface
{
    public function checkCorrectFormatFile(SplFileInfo $file);

    /*
     * return list RedirectItem
     * */
    public function getListToRedirects(SplFileInfo $file);
}
