<?php
require '../vendor/autoload.php';

use Vsavritsky\Redirector\Redirector;
use Vsavritsky\Redirector\RedirectorRegular;
use Vsavritsky\Redirector\FileReader\FileReaderCsv;

$t = new FileReaderCsv();
$redirectorStatic = new RedirectorRegular(new FileReaderCsv());
$redirectorStatic->addFileToRedirects(new SplFileInfo(__DIR__.'/data/test_redirect_regular.csv'));

$redirector = new Redirector();
$redirector->addFactory($redirectorStatic);

$url = '/test_123123/'; // replace by get current url
$urlToRedirect = $redirector->getRedirectUrlByUrl($url);
if ($urlToRedirect) {
    echo $urlToRedirect;
}