<?php

namespace BNTFeujjj\fNoHunger;

use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    public function onPlayerExhaust(PlayerExhaustEvent $event): void
    {
        $player = $event->getPlayer();
        $config = $this->getConfig();
        if (in_array($player->getWorld()->getFolderName(), $config->get("worlds", []))) {
            $event->cancel();    
        }
    }
}
