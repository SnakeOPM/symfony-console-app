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
      $path_array = $this->find_files('./dirs', 'count'); // Ищем все пути к файлам count в папке dirs
        for ($counter = 0; $counter <= max(array_keys($path_array)); $counter++){   //перебор всех путей в получивщемся массиве из первой функции
          /*
          Здесь мы берем match all из файла с регулякой которая ищет все цифры в файле, потому что если поступить проще
          и взять file_get_contents из файла (что я в начале и сделал) мы получим строку с неполными данными, но создаётся 2я проблема
          в том что мы получаем двумерный массив, потому что preg_match_all возвращает двумерный массив (где каждый сверху массив соответствует своему регэкспу)
          потому приходится юзать array_reduce для приверения его в одномерный вид
          */
          preg_match_all('/[\d.]+/', file_get_contents($path_array[$counter]), $nums); 
          //3м аргументом тут идёт пустой массив, его в начале принимает carry
          $result = array_merge($result, array_reduce($nums, function($carry, $item) { return array_merge($carry, $item); }, []));
        }
        return print_r(array_sum($result)); // суммируем всё и выводим
    }

    private function find_files($dir, $pattern) {
        $files = glob($dir.'/'.$pattern); // Получаем все файлы из корня dirs
        foreach (glob($dir.'/*', GLOB_ONLYDIR) as $sub_dir) {
          $files = array_merge($files, $this->find_files($sub_dir, $pattern)); //перебор всех поддиректорий и запуск рекурсивной функции в array_merdge где мы складываем все резы
        }
        return $files; // на выходе получаем массив со всеми путями к файлам count
      }
   
}