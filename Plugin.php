<?php namespace JumpLink\KrauterVonAbisZ;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'JumpLink\KrauterVonABisZ\Components\KrauterList' => 'KrauterList'
        ];
    }

    public function registerSettings()
    {
    }
}


