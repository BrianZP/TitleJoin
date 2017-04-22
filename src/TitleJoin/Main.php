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
		$this->getLogger()->info("§aPlugin enabled");
    }
	
    public function Join(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $task = new Send($this,$player);
        $this->getServer()->getScheduler()->scheduleDelayedTask($task,20);
    }
}
class Send extends PluginTask{
	public function __construct(PluginBase $owner,Player $player){
	    parent::__construct($owner);
	    $this->player = $player;
	}
	
  	public function onRun($tick){
		$player = $this->player->getName();
	  	$this->player->sendTitle("§l§aWelcome", "§l§b->§6 " . $player . " §b<-");
  	}
	
	public function onDisable(){
	$this->getLogger()->info("§cPlugin disabled");
	}
}  
