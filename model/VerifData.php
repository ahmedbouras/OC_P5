<?php
class VerifData
{
    public static function keysAndValues(array $superglobal, array $myKeys): bool
    {
        foreach($myKeys as $key => $value)
        {
            if(!array_key_exists($value, $superglobal) || empty($superglobal[$value]))
            {
                return false;
            }
        }
        return true;
    }
    public static function isValidEmail(string $email): bool
    {
        return preg_match("#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $email);
    }
    public static function isPositiveInt($info): bool
    {
        return preg_match("#^[1-9][0-9]*$#", $info);
    }
}