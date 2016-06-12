<?php
namespace Vsavritsky\Redirector;

class RedirectItem
{
    private $to;
    private $from;

    public function __construct($from, $to) {
        $this->setTo($to);
        $this->setFrom($from);
    }

    public function setTo($to) {
        $to = trim($to);
        $this->to = $to;
    }

    public function getTo() {
        return $this->to;
    }

    public function setFrom($from) {
        $from = trim($from);
        $this->from = $from;
    }

    public function getFrom() {
        return $this->from;
    }
}

