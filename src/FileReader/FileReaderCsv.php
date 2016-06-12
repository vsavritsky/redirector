<?php
namespace Vsavritsky\Redirector\FileReader;

use SplFileInfo;
use League\Csv\Reader;
use Vsavritsky\Redirector\RedirectItem;

class FileReaderCsv extends BaseFileReader
{
    protected $extensions = ['csv'];

    public function __construct($encoding = 'UTF-8', $delimiter = ';') {
        $this->delimiter = $delimiter;
        $this->encoding = $encoding;
    }

    public function getListToRedirects(SplFileInfo $file) {
        $csv = Reader::createFromPath($file->getPathname());
        $csv->setDelimiter($this->delimiter);
        $res = $csv->addFilter(function ($row) {
            return isset($row[0], $row[1]);
        })->addFilter(function ($row) {
            return !empty($row[0]) && !empty($row[1]);
        });

        $list = [];
        foreach ($res as $row) {
            $list[] = new RedirectItem($row[0], $row[1]);
        }

        return $list;
    }
}
