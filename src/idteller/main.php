<?php

declare(strict_types=1);

namespace idteller;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\block\Block;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\block\BlockBreakEvent;

class main extends PluginBase implements Listener{

	public function onEnable(){
		self::$instance = $this;
	    Server::getInstance()->getLogger()->info(TextFormat::GREEN . "ID-Teller Loaded!");
		Server::getInstance()->getPluginManager()->registerEvents($this,  $this);
   	}
        
	public function onDisable(){
        $this->getLogger()->info(TextFormat::RED . "ID-Teller Disabled!");
   	}
	
	public function onBreak(BlockBreakEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$idteller = $event->getBlock();
		$idteller = " " . $idteller->getId(). ":" . $idteller->getDamage();
	    $player->sendMessage(TextFormat::GREEN . "ID: " . $idteller);
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
	
	public static function getInstance(){
		return self::$instance;
	}

	public static $instance;
}
