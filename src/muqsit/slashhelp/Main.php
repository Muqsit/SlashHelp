<?php

declare(strict_types=1);

namespace muqsit\slashhelp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\plugin\PluginBase;

final class Main extends PluginBase{

	public function onEnable() : void{
		$command = new PluginCommand("Help", $this);
		$command->setExecutor($this);
		$this->getServer()->getCommandMap()->register($this->getName(), $command);
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		$this->getServer()->dispatchCommand($sender, "help " . implode(" ", $args)); // TODO: fix this - this breaks args with spaces surrounded in quotes
		return true;
	}
}