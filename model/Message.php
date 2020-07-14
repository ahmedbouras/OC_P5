<?php
class Message
{
    private static $_errorId = "Identifiants incorrects.";
    private static $_emptyFields = "Veuillez remplir tous les champs.";
    private static $_messageSent = "Votre message a été envoyé avec succès !";
    private static $_errorEmail = "Veuillez saisir un email valide.";
    private static $_commentSent = "Votre commentaire a bien été envoyé. Il sera soumis à validation.";
    private static $_createdArticle = "Votre article a bien été créé !";
    private static $_modifiedArticle = "Votre article a bien été modifié !";

    public static function errorId()
    {
        return self::$_errorId;
    }
    public static function emptyFields()
    {
        return self::$_emptyFields;
    }
    public static function messageSent()
    {
        return self::$_messageSent;
    }
    public static function errorEmail()
    {
        return self::$_errorEmail;
    }
    public static function commentSent()
    {
        return self::$_commentSent;
    }
    public static function createdArticle()
    {
        return self::$_createdArticle;
    }
    public static function modifiedArticle()
    {
        return self::$_modifiedArticle;
    }
}