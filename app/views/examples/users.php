<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .group {
        display: flex;
    }
    form {
        border: solid 1px;
        padding: 5px;
        margin: 5px;
    }
</style>

<body>
    <h1>Users Page!</h1>
    <br>
    <?php
        //Validar mensagens 
        echo !empty($data['msg']) ? '<h5>'.$data['msg'].'</h5>' : null 
    ?>
    <br>
    <div class="group">
        <form action="Users/insertUserForm" method="POST">
        <h3>Insert user</h3>
            <input type="text" name="name" placeholder="Name"><br><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <button type="submit">Submit</button>
        </form>

        <form action="Users/loginUserForm" method="POST">
        <h3>Login user</h3>
            <input type="text" name="user" placeholder="Username or email"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <button type="submit">Submit</button>
        </form>
        
    </div>
    <p>
        <?php
           //print_r($result) . "<br>";
            //echo $data['msg'].'<br>';
            echo $data['jobData']['work'] . '<br><br>';

            //Return user data
            if(isset($data['userData'])){
                foreach($data['userData'] as $user):
                    echo '<hr>';
                    echo $user['name'];
                    echo '<br>';
                    echo $user['email'];
                    echo '<hr>';
                endforeach;
            }else{
                echo "User data not found!";
            }
            ?>
    </p>
</body>
</html>