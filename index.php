<?php
session_start();
spl_autoload_register(function ($className)
{
    include "model/$className.php";
});
include 'controller/frontend.php';
include 'controller/backend.php';
$get = array_map('htmlspecialchars', $_GET);
$post = array_map('htmlspecialchars', $_POST);
$session = array_map('htmlspecialchars', $_SESSION);

try {
    if(isset($get['page']))
    {
        switch ($get['page']) {
            case 'home':
                if(VerifData::keysAndValues($get, ['result']) && $get['result'] === 'success')
                {
                    home('success', Message::messageSent());
                }
                else
                {
                    if(VerifData::keysAndValues($post, ['name', 'email', 'message']))
                    {
                        if(VerifData::isValidEmail($post['email']))
                        {
                            sendMessage($post);
                        }
                        else
                        {
                            home('danger', Message::errorEmail());
                        }
                    }
                    else
                    {
                        home('warning', Message::emptyFields());
                    }
                }
                break;
            case 'blog':
                blog();
                break;
            case 'article':
                if(VerifData::keysAndValues($get, ['id']) && VerifData::isPositiveInt($get['id']))
                {
                    if(VerifData::keysAndValues($get, ['action']))
                    {
                        switch ($get['action']) {
                            case 'comment':
                                if(VerifData::keysAndValues($post, ['name', 'comment']))
                                {
                                    comment($get['id'], $post);
                                }
                                else
                                {
                                    article($get['id'], 'warning', Message::emptyFields());            
                                }
                                break;
                            case 'commentSent':
                                article($get['id'], 'success', Message::commentSent());
                                break;
                            default:
                                
                                break;
                        }
                    }
                    else
                    {
                        article($get['id']);
                    }
                }
                else
                {
                    error404();
                }
                break;
            case 'loginPage':
                if(VerifData::keysAndValues($get, ['result']) && $get['result'] === 'error')
                {
                    loginPage('danger', Message::errorId());
                }
                else
                {
                    loginPage();
                }
                break;
            case 'attemptConnexion':
                if(VerifData::keysAndValues($post, ['login', 'pwd']))
                {
                    attemptConnexion($post['login'], $post['pwd']);
                }
                else
                {
                    loginPage('warning', Message::emptyFields());
                }
                break;
            case 'dashboard':
                if(isset($_SESSION['id']))
                {
                    if(VerifData::keysAndValues($get, ['action', 'id']) && VerifData::isPositiveInt($get['id']))
                    {
                        switch ($get['action']) {
                            case 'rmArticle':
                                deleteArticle($get['id']);
                                break;
                            case 'validationComment':
                                validateComment($get['id']);
                                break;
                            case 'rmComment':
                                deleteComment($get['id']);
                                break;
                            default:
                                dashboard();
                                break;
                        }
                    }
                    else
                    {
                        dashboard();
                    }
                }
                else
                {
                    error403();
                }
                break;
            case 'dashboardArticle':
                if(isset($_SESSION['id']))
                {
                    if(VerifData::keysAndValues($get, ['action', 'id']) && VerifData::isPositiveInt($get['id']))
                    {
                        switch ($get['action']) {
                            case 'modification':
                                dashboardArticle(null, null, true, $get['id']);
                                break;
                            case 'updateArticle':
                                if(VerifData::keysAndValues($post, ['title', 'author', 'chapo', 'content']))
                                {
                                    updateArticle($get['id'], $post);
                                }
                                else
                                {
                                    dashboardArticle('warning', Message::emptyFields(), true, $get['id']);
                                }
                                break;
                            default:
                                dashboardArticle();
                                break;
                        }
                    }
                    elseif(VerifData::keysAndValues($get, ['action']))
                    {
                        switch ($get['action']) {
                            case 'creation':
                                dashboardArticle();
                                break;
                            case 'createArticle':
                                if(VerifData::keysAndValues($post, ['title', 'author', 'chapo', 'content']))
                                {
                                    createArticle($post);
                                }
                                else
                                {
                                    dashboardArticle('warning', Message::emptyFields());
                                }
                                break;
                            default:
                                dashboardArticle();
                                break;
                        }
                    }
                    elseif(VerifData::keysAndValues($get, ['result']))
                    {
                        switch ($get['result']) {
                            case 'created':
                                dashboardArticle('success', Message::createdArticle());
                                break;
                            case 'modified':
                                dashboardArticle('success', Message::modifiedArticle());
                                break;
                            default:
                                dashboardArticle();
                                break;
                        }
                    }
                    else
                    {
                        dashboardArticle();
                    }
                }
                else
                {
                    error403();
                }
                break;
            case 'deconnexion':
                deconnexion();
                break;
            case 'error404':
                error404();
                break;
            case 'error403':
                error403();
                break;
            default:
                error404();
                break;
        }
    }
    else
    {
        home();
    }
} catch (Exception $e) {
    errorDB();
}