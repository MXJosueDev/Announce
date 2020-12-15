<?php

namespace MXJosueDev\Announce;

use pocketmine\{plugin\PluginBase, Server, Player, command\CommandSender, command\Command};

class Announce extends PluginBase {
  
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args){
    switch($cmd->getName){
      case "announce":
        if($sender instanceof Player){
          
        }
    }
  }
}
