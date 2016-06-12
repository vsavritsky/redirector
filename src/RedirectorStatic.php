<?php
namespace Vsavritsky\Redirector;

class RedirectorStatic extends RedirectorFromFile
{
    protected function check($url, RedirectItem $redirectItem)
    {
        if($url == $redirectItem->getFrom()) {
            return true;
        }

        return false;
    }
}