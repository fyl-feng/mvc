<?php
/**
 * Created by PhpStorm.
 * User: fengyalei
 * Date: 2021/12/16
 * Time: 14:56
 */

namespace library;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public function view($file,$data=[]){
        $file = ROOT.'/views/'.$file.'.php';
        if (is_file($file)){
            extract($data);
            include($file);
        }

//        $file = ROOT.'/views/'.$file.'.php.twig';
//        if (is_file($file)){
//            $loader = new  FilesystemLoader(ROOT.'/views');
//
//            $twig = new Environment($loader, array(
//                'cache' => ROOT.'/app/cache',
//                'debug' =>  DEBUG
//            ));
//
//            $template = $twig->load($file);
//
//            return $template->render($data);
//
//            return $twig->display($file,$data);
//        }
    }
}