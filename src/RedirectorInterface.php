<?php
namespace Vsavritsky\Redirector;

interface RedirectorInterface
{
    public function addFactory(RedirectorItemFactoryInterface $factory);
    public function getRedirectUrlByUrl($url);
}
