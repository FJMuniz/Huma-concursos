<?PHP

namespace Config;


class Chronometer
{
    private static $instance = null;
    private $startTime;
    private $endTime;

    private function __construct()
    {
        $this->startTime = 0;
        $this->endTime = 0;
    }

    public static function GetInstance()
    {
        if (self::$instance == null)
            self::$instance = new Chronometer();

        return self::$instance;
    }

    private function microtime_float()
    {
        list($useg, $seg) = explode(" ", microtime());
        return ((float)$useg + (float)$seg);
    }

    function chronometerStart()
    {
        $this->startTime = microtime_float();
    }

    function chronometerReset()
    {
        $this->startTime = microtime_float();
    }

    function chronometerStep()
    {
        $this->endTime = microtime_float();
        return $this->endTime - $this->startTime;
    }
}
