<?php

namespace BeeAZZ\NoChangeSkin;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerChangeSkinEvent;

class Main extends PluginBase implements Listener{
  
 public function onEnable(): void{
   $this->getServer()->getPluginManager()->registerEvents($this, $this);
   $this->saveDefaultConfig();
 }
 public function onChangeSkin(PlayerChangeSkinEvent $event){
  if($this->getConfig()->get("no-change") === true){
    $event->cancel();
    $event->getPlayer()->sendMessage($this->getConfig()->get("no-change-msg"));
  }
 }
}
