<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>-->
    <title>Login Form</title>
    <link rel="stylesheet" href="src/views/assets/css/login.css">
</head>

<body>
    <!--    Região de login     -->
    <main class="container">
        <h1>Time traking</h1>
        <h2>Login</h2>
        
        <form action="#" method="post">

            <div class="input-field">
                <!-- label for="username">E-mail</label> -->
            
                <input type="text" name="user" id="user"
                    
                    value="<?php echo isset($user) ? $user : ''; ?>"
                    
                    placeholder="Enter your username">
                    <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password"
                
                placeholder="Enter your password">

                <div class="underline"></div>
            </div>
                
            <?php  include (VIEW_PATH . '/template/messages.php');  ?>                      

            <input type="submit" value="Continue">
        
        </form>
    </main>
</body>
</html>
