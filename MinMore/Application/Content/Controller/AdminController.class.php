<?php

namespace Content\Controller;

use Common\Controller\Base;

class AdminController extends Base {
    public function dump_site_config() {
        dump(get_site_config());
    }

    private function check_path($p) {
        $root = realpath(SITE_PATH);
        $path = realpath($p);
        if(strpos($path, $root) === 0){
            return true;
        }
    }

    private function analyse_syntax($p) {
        $info = pathinfo($p);
        if($info['extension']){
            switch($info['extension']){
                case 'js':
                    return 'javascript';
                default:
                    return $info['extension'];
            }
        }else{
            return $info['basename'];
        }
    }

    public function dump_file() {
        $path = I('path');
        $realpath = realpath(SITE_PATH . $path);
        if($this->check_path($realpath)){
            $content = file_get_contents($realpath);
            $this->assign("realpath", $realpath);
            $this->assign("language", $this->analyse_syntax($realpath));
            $this->assign("content", $content);
            return $this->display("highlight");
        }else{
            die("file not exists");
        }
    }       

    public function clear_runtime_files() {
        $dir = new \Dir();
        $dir->delDir(RUNTIME_PATH);
        die(RUNTIME_PATH . " has been cleared!");
    }
}
