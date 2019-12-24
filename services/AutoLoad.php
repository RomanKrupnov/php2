<?php
class AutoLoad
{
    public function LoadClass($className)
    {
        $classNameClear = str_replace('\\', '/', str_replace('App\\', '', $className));
        $file = dirname(__DIR__) . '/' . $classNameClear . '.php';
        if (file_exists($file)) {
            include_once $file;
            return;
        }
    }


}