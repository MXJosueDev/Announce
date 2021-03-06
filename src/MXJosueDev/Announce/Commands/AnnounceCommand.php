<?php
declare(strict_types=1);
/**
 * Announce Plugin.
 *
 * Author: MXJosueDev
 * Status: Public
 * Contributors: None
 */
namespace MXJosueDev\Announce\Commands;

use MXJosueDev\Announce\Announce;

use pocketmine\command\{Command, CommandSender};
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;

class AnnounceCommand extends Command {
	
	/** @var Announce */
	protected $plugin;
	
	/**
	 * AnnounceCommand constructor.
	 *
	 * @param Announce $plugin
	 */
	public function __construct(Announce $plugin){
		parent::__construct("announce", " ", null, ["alert"]);
		$this->setPermission("announce.cmd.use");
		$this->plugin = $plugin;
	}
	
	/**
	 * @param CommandSender $sender
	 * @param String $label
	 * @param Array $args
	 *
	 * @return mixed|void
	 */
	public function execute(CommandSender $sender, String $label, Array $args){
		if(!$this->testPermission($sender)){
			$sender->sendMessage(TF::RED."You don't have permission to use the command");
			return;
		}
		if(!isset($args[0])){
			$sender->sendMessage(TF::RED."Usage /{$label} [string: message]");
			return;
		}
		$msg = implode($args, ' ');
		$this->plugin->getServer()->broadcastMessage(TF::RED."[ANNOUNCE]\n".TF::GRAY.$msg);
		if($sender instanceof Player){
			$sender->sendPopup(TF::GREEN.'Announce send!');
		}
	}
}
