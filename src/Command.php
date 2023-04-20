<?php namespace Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

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
          preg_match_all('/[\d.]+/', file_get_contents($path_array[$counter]), $nums); 
          $result = array_merge($result, array_reduce($nums, function($carry, $item) { return array_merge($carry, $item); }, []));
        }
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
