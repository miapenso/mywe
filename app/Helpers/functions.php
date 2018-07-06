<?php
function is_base64($str){
    if(!is_string($str)){
        return false;
    }
    return $str == base64_encode(base64_decode($str));
}
function is_serialized($data, $strict = true) {
    if (!is_string($data)) {
        return false;
    }
    $data = trim($data);
    if ('N;' == $data) {
        return true;
    }
    if (strlen($data) < 4) {
        return false;
    }
    if (':' !== $data[1]) {
        return false;
    }
    if ($strict) {
        $lastc = substr($data, -1);
        if (';' !== $lastc && '}' !== $lastc) {
            return false;
        }
    } else {
        $semicolon = strpos($data, ';');
        $brace = strpos($data, '}');
        if (false === $semicolon && false === $brace)
            return false;
        if (false !== $semicolon && $semicolon < 3)
            return false;
        if (false !== $brace && $brace < 4)
            return false;
    }
    $token = $data[0];
    switch ($token) {
        case 's' :
            if ($strict) {
                if ('"' !== substr($data, -2, 1)) {
                    return false;
                }
            } elseif (false === strpos($data, '"')) {
                return false;
            }
        case 'a' :
        case 'O' :
            return (bool)preg_match("/^{$token}:[0-9]+:/s", $data);
        case 'b' :
        case 'i' :
        case 'd' :
            $end = $strict ? '$' : '';
            return (bool)preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
    }
    return false;
}
/**
 * 序列化数据
 * @param $value
 * @return string
 */
function iserializer($value) {
    return serialize($value);
}
/**
 * 反序列化
 * @param $value
 * @return array|mixed
 */
function iunserializer($value) {
    if (empty($value)) {
        return array();
    }
    if (!is_serialized($value)) {
        return $value;
    }
    $result = unserialize($value);
    if ($result === false) {
        $temp = preg_replace_callback('!s:(\d+):"(.*?)";!s', function ($matchs){
            return 's:'.strlen($matchs[2]).':"'.$matchs[2].'";';
        }, $value);
        return unserialize($temp);
    } else {
        return $result;
    }
}