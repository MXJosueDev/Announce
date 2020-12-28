<?php
/*  __  __  __  __      _                                ____                 
*  |  \/  | \ \/ /     | |   ___    ___   _   _    ___  |  _ \    ___  __   __
*  | |\/| |  \  /   _  | |  / _ \  / __| | | | |  / _ \ | | | |  / _ \ \ \ / /
*  | |  | |  /  \  | |_| | | (_) | \__ \ | |_| | |  __/ | |_| | |  __/  \ V / 
*  |_|  |_| /_/\_\  \___/   \___/  |___/  \__,_|  \___| |____/   \___|   \_/  
*/                                                                           

namespace MXJosueDev\Announce\Commands;

use MXJosueDev\Announce\Announce;
use pocketmine\command\{PluginCommand, CommandSender};
use pocketmine\{Server, Player};
use pocketmine\utils\TextFormat as TF;

class AnnounceCommand extends PluginCommand {
  
  /**
   * AnnounceCommand constructor.
   *
   * @param Announce $plugin
  */
  public function __construct(Announce $plugin){
    parent::__construct("announce", $plugin);
    $this->setPermission("announce.send");
  }
  
  /**
   * @param CommandSender $sender
   * @param string $label
   * @param array $args
   *
   * @return bool|mixed|void
  */
  public function execute(CommandSender $sender, string $label array $args){
    if($this->testPermission($sender)){
      if(count($args) <= 0){
        $sender->sendMessage(TF::RED."Usage /announce <message>");
      }
      if(count($args) >= 1){
        $message = implode($args, " ");
        Server::getInstance()->broadcastMessage(TF::RED."[ANNOUNCE] ".TF::GRAY.$message);
        if($sender instanceof Player){
          $sender->sendPopup(TF::WHITE."Announcement in progres...");
        }
      }
    }
  }
}
