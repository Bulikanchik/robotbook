<?php
include $_SERVER['DOCUMENT_ROOT'].'/config.php';
error_reporting(E_ALL);
ignore_user_abort(true);
ini_set('display_errors', 'on');
ini_set('error_log', 'error_log.txt');
header('X-Robots-Tag: noindex');
header('X-Frame-Options: DENY');
header('Content-Type: text/html; charset=UTF-8');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');


$auth_user = isset($_SERVER['PHP_AUTH_USER']) ? trim(strip_tags($_SERVER['PHP_AUTH_USER'])) : ''; // Пользователь
$auth_pw = isset($_SERVER['PHP_AUTH_PW']) ? trim(strip_tags($_SERVER['PHP_AUTH_PW'])) : '';
// авторизация юзера:
if (!isset($login[$auth_user]) OR $login[$auth_user] != $auth_pw) {
  header('WWW-Authenticate: Basic realm="Admin"');
  header('HTTP/1.1 401 Unauthorized');
  echo 'You need to enter a valid username and password.';
  die();
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    
    <title>LockPixel </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/structure.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/fonticons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/alert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/jquery.steps.css" rel="stylesheet" type="text/css" />
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>
    <link rel="stylesheet" type="text/css" href="assets/css/switches.css">
    <link href="assets/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme-checkbox-radio.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom_dt_custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
    <link href="assets/css/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
  
    
    <link href="assets/css/myStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
 
    <!--  LOADER  -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow text-danger align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
           
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.php">
                        <img src="assets/img/logo.png" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.php" class="nav-link">LOCKPIXEL 0.1.3</a>
                </li>
            </ul>
        </header>
    </div>
  
    
    
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
        </header>
    </div>
    <!--  END NAVBAR  -->



    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    
                    <li class="menu">
                        <a class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Аккаунты</span>
                            </div>
                        </a>
                        
                        
                        <ul class="nav cllapse submenu list-unstyled show" role="tablist">
                            <li class="nav-item">
                                <a onclick="window.location.hash='accounts';" class="nav-link active" id="accounts-tab" data-toggle="tab" href="#accounts" role="tab" aria-controls="accounts" aria-selected="true">Информация</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="cabs-tab" data-toggle="tab" href="#cabs" role="tab" aria-controls="cabs" aria-selected="false">Рекламные кабинеты</a>
                            </li>
                            
                        </ul>
                        
                        
                    </li>
                    
                    <li class="menu">
                        <a class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation-2"><circle cx="12" cy="12" r="11"></circle><polygon points="12 4 18 16 12 12 6 16 12 4"></polygon></svg>
                                <span>Ads Manager</span>
                            </div>
                        </a>
                        <ul class="nav collapse submenu list-unstyled show" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="campaigns-tab" data-toggle="tab" href="#campaigns" role="tab" aria-controls="campaigns" aria-selected="false">Кампании</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="adsets-tab" data-toggle="tab" href="#adsets" role="tab" aria-controls="adsets" aria-selected="false">Адсеты</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="ads-tab" data-toggle="tab" href="#ads" role="tab" aria-controls="ads" aria-selected="false">Объявления</a>
                            </li>
                        </ul>
                       
                    </li>
                    
                    <li class="menu">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#registerModal">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                <span>Добавить аккаунт</span>
                            </div>
                        </a>
                    </li>
                    
                    
                    <li class="menu">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#templateModal">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                <span>Добавить шаблон</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#deleteTemplateModal">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path></path><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></svg>
                                <span>Удалить шаблон</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#groupModal">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cloud"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
                                <span>Добавить группу</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#deleteGroupModal">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cloud-off"><path d="M22.61 16.95A5 5 0 0 0 18 10h-1.26a8 8 0 0 0-7.05-6M5 5a8 8 0 0 0 4 15h9a5 5 0 0 0 1.7-.3"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                <span>Удалить группу</span>
                            </div>
                        </a>
                    </li>
                
                    
                    <li class="menu" hidden>
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#proxyModal">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wifi"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                                <span>Добавить прокси</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu" hidden>
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#deleteProxyModal">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-wifi-off"><line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                                <span>Удалить прокси</span>
                            </div>
                        </a>
                    </li>
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->
       
        
            
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="tab-content" id="simpletabContent">
                    <div class="tab-pane fade show active" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                        <?php include('accounts.php');?>
                    </div>
                    <div class="tab-pane fade" id="cabs" role="tabpanel" aria-labelledby="cabs-tab">
                        <?php include('cabs.php');?>
                    </div>
                    <div class="tab-pane fade" id="campaigns" role="tabpanel" aria-labelledby="campaigns-tab">
                        <?php include('campaigns.php');?>
                    </div>
                    <div class="tab-pane fade" id="adsets" role="tabpanel" aria-labelledby="adsets-tab">
                        <?php include('adsets.php');?>
                    </div>
                    <div class="tab-pane fade" id="ads" role="tabpanel" aria-labelledby="ads-tab">
                        <?php include('ads.php');?>
                    </div>
                </div>
                    
                
                
                
            <div class="alert alert-success mb-4 success" role="alert"> <button hidden type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong id="SuccessAlert">Группа добавлена!</strong></div> 
            <div class="alert alert-danger mb-4 error" role="alert"> <button hidden type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong id="ErrorAlert">Ошибка! Группа не добавлена!</strong></div> 
            <div class="alert alert-warning mb-4 warning" role="alert"> <button hidden type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong id="WarningAlert"></strong></div> 
                
             </div>
        </div>
        <!-- END MAIN CONTAINER -->
    
    
    </div>
    

<?php
include('modals/addAccount.php');
include('modals/addTemplate.php');
include('modals/deleteTemplate.php');
include('modals/addGroup.php');
include('modals/deleteGroup.php');
include('modals/addProxy.php');
include('modals/deleteProxy.php');
include('modals/createAd.php');
include('modals/createFp.php');
include('modals/changeCurrency.php');
include('modals/addCard.php');
?>


<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.steps.min.js"></script>
<script src="assets/js/custom-jquery.steps.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/file-upload-with-preview.min.js"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/datatables.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/custom-select2.js"></script>
<script>
$('.alert').hide();


$(".tagging").select2({
    tags: true
});
</script>

<script src="funcs.js"></script>
<script src="posts.js"></script>
<script>
    loadTables();
</script>


</body>
</html>