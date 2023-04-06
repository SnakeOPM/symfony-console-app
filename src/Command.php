<?php namespace Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function sum_data_files(){
      $result = array();
      $path_array = $this->find_files('./dirs', 'count');
        for ($counter = 0; $counter <= max(array_keys($path_array)); $counter++){
          print_r($path_array[$counter]);
          $result = array_merge($result, array(file_get_contents($path_array[$counter])));
        }
        print_r($result);
        return array_sum($result);
    }

    private function find_files($dir, $pattern) {
        $files = glob($dir.'/'.$pattern);
        foreach (glob($dir.'/*', GLOB_ONLYDIR) as $sub_dir) {
          $files = array_merge($files, $this->find_files($sub_dir, $pattern));
        }
        return $files;
      }
   
}