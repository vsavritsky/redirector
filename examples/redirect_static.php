<?php
require '../vendor/autoload.php';

use Vsavritsky\Redirector\Redirector;
use Vsavritsky\Redirector\RedirectorStatic;
use Vsavritsky\Redirector\FileReader\FileReaderCsv;

$t = new FileReaderCsv();
$redirectorStatic = new RedirectorStatic(new FileReaderCsv());
$redirectorStatic->addFileToRedirects(new SplFileInfo(__DIR__.'/data/test_redirect_static.csv'));

$redirector = new Redirector();
$redirector->addFactory($redirectorStatic);

$url = '/test/'; // replace by get current url
$urlToRedirect = $redirector->getRedirectUrlByUrl($url);
if ($urlToRedirect) {
    echo $urlToRedirect;
}