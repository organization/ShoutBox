<?php

namespace ShoutBox;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class ShoutBox extends PluginBase implements Listener {
	public function onEnable() {
		$this->getLogger()->info("§3✿ ShoutBox_v1.0 on Loading ✿");
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
  	switch(strtolower($command->getName())){
  		case "일반확성기":
  		if(!$sender->getInventory()->contains(new Item(339, 0, 1))){
  		  $sender->sendMessage ("§3[ 서버 ] 일반 확성기 사용권이 부족합니다 !");
        return true;
  	  }
  	  $sender->getInventory()->removeItem(new Item(339, 0, 1));
  	  $message = implode(" ", $args);
  	  $this->getServer()->broadcastMessage("§6[ 일반확성기 ] ". $sender->getName() ." : $message");
      $sender->sendMessage("§3[ 서버 ] 일반 확성기 사용권 1개를 사용하였습니다 !");
      return true;
      break;
      case "고급확성기":
      if(!$sender->getInventory()->contains(new Item(340, 0, 1))){
  		  $sender->sendMessage ("§3[ 서버 ] 고급 확성기 사용권이 부족합니다 !");
        return true;
  	  }
  	  $sender->getInventory()->removeItem(new Item(340, 0, 1));
  	  $message = implode(" ", $args);
  	  $this->getServer()->broadcastMessage ("§7✿--------------------------------------✿");
  	  $this->getServer()->broadcastMessage ("§6[ 고급확성기 ] ".$sender->getName()." : $message");
  	  $this->getServer()->broadcastMessage ("§7✿--------------------------------------✿");
  	  $sender->sendMessage("§3[ 서버 ] 고급 확성기 사용권 1개를 사용하였습니다 !");
  	  return true;
  	}
  }
}

?>
