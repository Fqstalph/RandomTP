<?php 

namespace RandomTP;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandExecutor;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
   	$this->getServer()->getPluginManager()->registerEvents($this, $this);   
    }
	
	public function onCommand(CommandSender $sender, Command $cmd, String $label, array $args) : bool{
		switch($cmd->getName()) {
               case "rand":
			     if($sender->hasPermission("randomtp.cmd")) {
				   if($sender instanceof Player){
                    $players = $this->getServer()->getOnlinePlayers();
                    $random_key = array_rand($players);
                    $random_player = $players[$random_key];
                    
					$sender->teleport($random_player);
					$message = str_replace("{player}", $random_player->getDisplayName(), $this->getConfig()->get("TeleportMessage"));
					$sender->sendMessage($message);
				   }
		        }
		}
		return true;	
    }
}