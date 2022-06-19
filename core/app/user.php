<?php 
namespace core\app;

use core\app\Application;
use PDO;
class user 
{


    public static function findUser()
    {
        $stmt = Application::$app->db->pdo->prepare("
        SELECT * FROM app_users WHERE id = :id
        ");
        $stmt->bindValue(":id" , Application::$app->session->userId , PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_CLASS);
        if($user) return array_shift($user);
    }

    public static function getProfile()
    {
        $stmt = Application::$app->db->pdo->prepare("
        SELECT * FROM app_users_profile aup INNER JOIN app_users au
        ON aup.userId = au.id
        where au.id = :id
        ");
        $stmt->bindValue(":id" , Application::$app->session->userId , PDO::PARAM_INT);
        $stmt->execute();
        $profile = $stmt->fetchAll(PDO::FETCH_CLASS);
        if($profile)
        {
            $profile = array_shift($profile);
            return $profile;
        }
    }
    public static function displayName()
    {
        $user = static::findUser();
       if($user)
       {
            return $user->firstName." ".$user->lastName;
       }
    }
    public static function displayEmail()
    {
        $user = static::findUser();
        if($user)
        {
            return $user->email;
        }
        
    }
    public static function displayBio()
    {
        $profile = self::getProfile();
        return !$profile ? null : $profile->bio ;
    }
    public static function displayImage()
    {
        $profile = self::getProfile();
        if($profile AND $profile->image != null)
        {
            return  Application::$app->request->toUpladesaFile("images/profile/$profile->image") ;
        }else
        {
            return Application::$app->request->toUpladesaFile("images/profile.jpg");
        }


    }
    public static function displayMobile()
    {
        $profile = self::getProfile();
        return !$profile ? null : $profile->mobile ;
    }
    public static function displayGender()
    {
        $profile = self::getProfile();
        return !$profile ? null : $profile->gender ;
    }


    
    

}