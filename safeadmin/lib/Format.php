<?php
/**
 * Format Class
 */
class Format{
    public function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }

    function dateToString($date){
        return date('d M Y', strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . ".....";
        return $text;
    }

    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function title(){
        $path  = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        //$title = str_replace('_', ' ', $title);
        if ($title == 'index') {
            $title = 'home';
        } elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }

    function urlGenerator($str){
        $title = preg_replace('/[^A-Za-z0-9\-]/', ' ', $str);
        $title = str_replace(" ","-", $title);
        $title = preg_replace('~-+~', '-', $title);
        $title = strtolower("$title");
        $title = trim($title, "-");
        return $title;
    }

    public function debug($str){
        echo "<pre>";
        print_r($str);
        echo "</pre>";
    }
    
    public function debugx($str){
        echo "<pre>";
        print_r($str);
        echo "</pre>";
        die();
    }
}
