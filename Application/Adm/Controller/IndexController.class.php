<?php
namespace Adm\Controller;
use Think\Controller;
class IndexController extends CheckAuthController {
    public function index(){
         $this->display();
    }
}