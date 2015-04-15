<?php
namespace Aevitas\ChannelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller {

    /**
    * @var log folder
    */
    const LOG_FOLDER="service/performance_logs";

	//use for log 
	protected function logHelper($filename, $message, $type = "service")
    {
        echo "$filename : $message \n";
        $message = $message . PHP_EOL;
        $folder = __DIR__ . "/../../../../app/logs/$type";
        $file = "$folder/$filename.txt";

        system("mkdir -p $folder");

        if (!file_exists($file)) {
            system("touch $file");
            system("chmod a+w $file");
        }

        file_put_contents($file, $message, FILE_APPEND);
    }
}
?>