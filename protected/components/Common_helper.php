<?php

/**
* UserIdentity represents the data needed to identity a user.
* It contains the authentication method that checks if the provided
* data can identity the user.
*/
class Common_helper
{

    static function get_safe($s_str){
        return htmlentities($s_str, ENT_QUOTES, 'utf-8');
    }

    static function put_safe($s_str){
        return html_entity_decode($s_str, ENT_QUOTES, 'utf-8');
    }

    static function get_name($id=0){
        $user = Yii::app()->db->createCommand()
        ->select('fname,lname')
        ->from('user_manager u')
        ->where('id=:id', array(':id'=>$id))
        ->queryRow();

        $name = ucfirst($user['fname'])." ".ucfirst($user['lname']);
        return $name;
    }

    static function character_limiter($str, $n = 100, $end_char = '&#8230;')
    {
        if (strlen($str) < $n)
        {
            return $str;
        }

        $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

        if (strlen($str) <= $n)
        {
            return $str;
        }

        $out = "";
        foreach (explode(' ', trim($str)) as $val)
        {
            $out .= $val.' ';

            if (strlen($out) >= $n)
            {
                $out = trim($out);
                return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
            }
        }
    }


}