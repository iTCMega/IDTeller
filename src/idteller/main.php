<?php

declare(strict_types=1);

namespace idteller;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\block\Block;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class main extends PluginBase implements Listener{

	public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN . "ID-Teller Loaded!"); 
		// get id in config sooner...
    /** $this->saveDefaultConfig();
        $this->reloadConfig();
        $this->worlds = $this->getConfig()->get("id-block"); */ 
   	}
        
	public function onDisable(){
        $this->getLogger()->info(TextFormat::RED . "ID-Teller Disabled!");
   	}
    
	public function onCommand(CommandSender $sender, Command $command, $label, array $args): bool{
		switch($command->getName()){
			case "id":
				$inventory = $sender->getInventory();
				$item = $inventory->getItemInHand();
		        $sender->sendMessage(TextFormat::GREEN . "ID : ".TextFormat::GOLD.$item->getId().":".$item->getDamage()." | ".$item->getName()." | ");
			break;
		}
		return true;
	}
}
