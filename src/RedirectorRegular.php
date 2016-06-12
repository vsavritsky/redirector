<?php
namespace Vsavritsky\Redirector;

class RedirectorRegular extends RedirectorFromFile
{
    protected function check($url, RedirectItem $redirectItem)
    {
        if (preg_match($redirectItem->getFrom(), $url)) {
            return true;
        }

        return false;
    }
}