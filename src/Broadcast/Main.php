<?php


namespace Broadcast;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class main extends PluginBase implements Listener
{

    public function onEnable()
    {
        $this->getLogger()->info(TextFormat::YELLOW."Broadcast Plugin wurde Aktiviert.");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        if($cmd->getName() === "broadcast"){
            if(!$sender->hasPermission("broadcast.cmd")){
                $sender->sendMessage(TextFormat::RED."Keine Rechte!");
            }else{
                if(isset($args[0])){
                    $msg = implode(" ", $args);
                    $this->getServer()->broadcastMessage(TextFormat::AQUA.$msg);
                    $sender->sendMessage(TextFormat::AQUA."Die Nachricht ".$msg." Wurde an den Server Gesendet.");
                }else{
                    $sender->sendMessage(TextFormat::RED."Benutzung: /broadcast, /bc Deine Nachricht");
                }
            }
        }
        return true;
    }
}