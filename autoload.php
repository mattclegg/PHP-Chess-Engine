<?php


function __autoload($class_name)
{
    $fileName = $class_name . '.php';
    $fileName = str_replace('\\', '/', $fileName);
//    var_dump(is_file($fileName)); echo $fileName;
    if(is_file($fileName))
    {
        include $fileName;
    }
    else
    {
        $fileName = substr($fileName, strpos($fileName, '\\') + 1);
        if(is_file($fileName))
        {
            include $fileName;
        }
        else
        {
            $fileName = substr($fileName, strpos($fileName, '\\') + 1);
            if(is_file($fileName))
            {
                include $fileName;
            }
        }
    }
}