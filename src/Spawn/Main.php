<?php

namespace Spawn;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener
{

  public $prefix = C::GRAY."";
  
  public function onEnable()
  {
	  $this->getLogger()->info($this->prefix.C::WHITE."Spawn plugin is enabled");
  }
  public function onDisable()
  {
	  $this->getLogger()->info($this->prefix.C::WHITE."Disabling Spawn plugin");
  }
  public function onCommand(CommandSender $s, Command $cmd,$label, array $args):bool
  {
    $ds = $this->getServer()->getDefaultLevel()->getSpawnLocation();
    $name = $s->getName();
    switch($cmd->getName())
    {
      case "spawn":
        if($s instanceof Player)
        {
          $s->sendMessage($this->prefix.C::GREEN."Teleporting...");
          $s->teleport($ds);
          return true;
        }
        else
        {
            $s->sendMessage(C::WHITE."This command can be used only in game");
            return true;
        }

	}
  }
}