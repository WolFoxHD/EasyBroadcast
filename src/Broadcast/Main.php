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
        $this->getLogger()->info(TextFormat::YELLOW."Broadcast plugin has been activated.");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        if($cmd->getName() === "broadcast"){
            if(!$sender->hasPermission("broadcast.cmd")){
                $sender->sendMessage(TextFormat::RED."No right!");
            }else{
                if(isset($args[0])){
                    $msg = implode(" ", $args);
                    $this->getServer()->broadcastMessage(TextFormat::AQUA.$msg);
                    $sender->sendMessage(TextFormat::AQUA."The message ".$msg." Has been sent to the server.");
                }else{
                    $sender->sendMessage(TextFormat::RED."use: /broadcast, /bc Your message");
                }
            }
        }
        return true;
    }
}
