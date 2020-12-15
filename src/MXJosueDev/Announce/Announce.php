<?php

namespace MXJosueDev\Announce;

use pocketmine\{plugin\PluginBase, Server, Player, command\CommandSender, command\Command, utils\TextFormat as TF};

class Announce extends PluginBase {
  
  public function onEnable(){
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->saveResource("config.yml");
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
    switch($cmd->getName){
      case "announce":
        if(count($args) == 0){
          $sender->sendMessage(TF::RED."Usage /announce <message>");
        }
        if(count($args) >= 1){
          $message = implode(" ", $args);
          
          Server::getInstance()->broadcastMessage($this->getConfig()->get("prefix"));
          Server::getInstance()->broadcastMessage(TF::GRAY.$message);
        }
    }
    return true;
  }
}
