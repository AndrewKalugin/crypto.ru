<?php

namespace App\Models;

class Profile extends \Core\Model
{
    #Получение информации пользователя
    public static function getUserInfo($userId)
    {
        $db = static::getConnection();

        $result = $db->prepare("SELECT id,user_email,balance FROM `users` WHERE id = :id");
        $result->bindParam(':id',$userId);
        $result->execute();

        $showProfile = array();
        $row = $result->fetch();
        $showProfile['id'] = $row['id'];
        $showProfile['user_email'] = $row['user_email'];
        $showProfile['balance'] = $row['balance'];

        return $showProfile;
    }
}

?>