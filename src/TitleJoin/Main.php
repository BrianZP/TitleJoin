<?php

namespace TitleJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\scheduler\PluginTask;

class Main extends PluginBase implements Listener{
     
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("§a[TitleJoin] Plugin enabled");
    }
	
    public function Join(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $task = new Send($this,$player);
        $this->getServer()->getScheduler()->scheduleDelayedTask($task,50);
    }
}
class Send extends PluginTask{
	public function __construct(PluginBase $owner,Player $player){
	    parent::__construct($owner);
	    $this->player = $player;
	}
	
  	public function onRun($tick){
		$player = $this->player->getName();
	  	$this->player->addTitle("§l§eHeaven§fCraft§r");
  	}
	
	public function onDisable(){
	$this->getLogger()->info("§c[TitleJoin] Plugin disabled");
	}
}  
