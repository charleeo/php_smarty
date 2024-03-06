<?php

namespace App\Configs;

use Smarty;

class SmartyConfig extends Smarty {
    protected $smarty;
    public  function __construct()
    {
        parent::__construct();
        $this->setTemplateDir('resources/templates/');
        $this->setCompileDir('lib/templates_c/');
        $this->setConfigDir('lib/configs/');
        $this->setCacheDir('lib/cache/');
        // $this->caching = true;
        // $this->cache_lifetime = 120;
    }
}


?>
