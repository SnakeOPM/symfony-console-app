<?php namespace Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;

class CountCommand extends Command
{
    
    public function configure()
    {
        $this -> setName('count')
            -> setDescription('gets all files from dirs and prints sum of numbers inside all count files')
            -> setHelp('This command allows count all nums in all "count" files located in dirs directory');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $sum = $this -> sum_data_files();
        $output -> write($sum);
        return Command::SUCCESS;
        
    }
}