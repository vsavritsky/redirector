<?php

namespace Vsavritsky\Redirector;

class Redirector implements RedirectorInterface
{
    protected $factories = [];

    public function addFactory(RedirectorItemFactoryInterface $fabric)
    {
        $this->factories[] = $fabric;
        return $this;
    }

    public function getRedirectUrlByUrl($url)
    {
        foreach($this->factories as $redirectFactoryItem) {
            $urlToRedirect = $redirectFactoryItem->checkUrl($url);
            $urlToRedirect = trim($urlToRedirect);

            if(strlen($urlToRedirect) > 0) {
                return $urlToRedirect;
            }
        }
    }
}
