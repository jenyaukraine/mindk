<?php
  class Loader
  {
    const debug = 1;
    
    public function __construct()
    {
      ;
    }
    public static function autoload($file, $ext = FALSE, $dir = FALSE)
    {
      $file = str_replace('\\', '/', $file);

      if($ext === FALSE)
      {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/../framework/Classes';
        $filepath = $_SERVER['DOCUMENT_ROOT'] . '/../framework/Classes/' . $file . '.class.php';
      }
      else
      {
        $path = $_SERVER['DOCUMENT_ROOT'] . (($dir) ? '/' . $dir : '');
        $filepath = $path . '/' . $file . '.' . $ext;
      }
      
      if (file_exists($filepath))
      {
          if(Loader::debug) Loader::StPutFile(('connected ' .$filepath));
          require_once($filepath);
      }
    }
    private static function StPutFile($data)
    {
      $dir = $_SERVER['DOCUMENT_ROOT'] .'/../app/log/autoloader.txt';
      $file = fopen($dir, 'a');
      flock($file, LOCK_EX);
      fwrite($file, ('║' .$data .'=>' .date('d.m.Y H:i:s') .'
║
' .PHP_EOL));
      flock($file, LOCK_UN);
      fclose ($file);
    }
  }
?>