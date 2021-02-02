<?php

namespace MXJosueDev\Announce;

use MXJosueDev\Announce\Commands\AnnounceCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\{Server, Player};
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as TF;

class Announce extends PluginBase {
  
  /**
   * @var Announce $plugin
  */
  public $plugin;
  
  /**
   * @var Instance $instance
  */
  public static $instance;
  
  /**
   * @return void
  */
  public function onLoad() : void{
    self::$instance = $this;
  }
  
  /**
   * @return void
  */
  public function onEnable() : void{
    $this->getServer()->getCommandMap()->register("announce", new AnnounceCommand($this));
  }
  
  /**
   * @return Announce
  */
  public static function getInstance() : self{
    return self::$instance;
  }
}
