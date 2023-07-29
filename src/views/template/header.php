<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/assets/css/comum.css">
    <link rel="stylesheet" href="views/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/assets/css/icofont.min.css">
    
    <?php if($_SESSION['is_login']): ?>
    
    <link rel="stylesheet" href="views/assets/css/login.css">

    <?php else: ?>

    <link rel="stylesheet" href="views/assets/css/template.css">
    
    <?php endif ?>

    <title>Marcador de ponto</title>
</head>
<body>
    
    <?php if(!$_SESSION['is_login']): ?>
    
        <header class="header">
        <div class="logo">
            <i class= "icofont-travelling mr-2"></i>
            <h6>Entrada e saída</h6>
            <i class= "icofont-runner-alt-1 ml-2"></i>
        </div>

        <div class="spacer"></div>
        

        <div class="dropdown">
            <div class="dropdown-button">
                
                <span class="ml-3">
                <?= $_SESSION['name'] ?>
                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                    <ul class=nav-list>
                        <li class="nav-item">
                            <a href="../controllers/logout.php">
                                <i class="icofont-logout mr-2"></i>
                                SAIR
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        
        </header>
    
    <?php endif ?>
 