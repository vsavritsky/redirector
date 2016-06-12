<?php
namespace Vsavritsky\Redirector;

use SplFileInfo;
use Vsavritsky\Redirector\Exception\ParseException;
use Vsavritsky\Redirector\FileReader\FileReaderInterface;

abstract class RedirectorFromFile implements RedirectorItemFactoryInterface
{
    private $fileReader;
    private $files = [];

    public function __construct(FileReaderInterface $fileReader) {
        $this->fileReader = $fileReader;
    }

    public function addFileToRedirects(SplFileInfo $file)
    {
        if (!$this->fileReader->checkCorrectFormatFile($file)) {
            throw new ParseException('this file incorrect type '.$file->getFilename());
        }
        $this->files[] = $file;
        return $this;
    }

    public function checkUrl($url)
    {
        foreach($this->files as $file) {
            if(!$file->isFile() || !$file->isReadable()) {
                throw new ParseException('this file no isReadable '.$file->getFilename());
            }
            $listRedirects = $this->fileReader->getListToRedirects($file);
            foreach ($listRedirects as $redirectItem) {
                if(strlen($this->check($url, $redirectItem))) {
                    return $redirectItem->getTo();
                }
            }
        }

        return;
    }

    abstract protected function check($url, RedirectItem $redirectItem);
}