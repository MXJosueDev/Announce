<?php
declare(strict_types=1);
/**
 * Announce Plugin.
 *
 * Author: MXJosueDev
 * Status: Public
 * Contributors: None
 */
namespace MXJosueDev\Announce;

use MXJosueDev\Announce\Commands\AnnounceCommand;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;

class Announce extends PluginBase {
	
	/** @var Announce */
	public static $plugin;
	
	/**
	 * @return void
	 */
	public function onEnable() : void{
		$this->getServer()->getCommandMap()->register("announce", new AnnounceCommand($this));
	}
}
