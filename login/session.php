<?php
/**
 *session相关类   talent4636@gmail.com
 */
class session{

    public function __constract(){
        $savePath = "./session/";
        $lifeTime = 60 * 60;
        session_save_path($savePath);
        session_set_cookie_params($lifeTime);
        session_start();
    }

    public function set($key,$value){
        if (!$key || !$value) {
            return false;
        }
        $_SESSION[$key] = $value;
    }

    public function get($key){
        if (isset($_SESSION[$Key])) {
            return $_SESSION[$key];
        }else {
            return false;
        }
    }

    public function getAll(){
        return $_SESSION;
    }

    public function del($key){
        if ($_SESSION[$Key]) {
            $r = session_unregister($key);
            if ($r) {
                return true;
            }else{
                return false;
            }
        }else {
            return false;
        }
    }

    public function destroy(){
        @session_destroy();
    }

    public function count(){

    }
}

?>