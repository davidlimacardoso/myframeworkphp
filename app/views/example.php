<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome 
        <?php 
            if(isset($data['title'])){
                echo "- " . $data['title'];;
            }         
        ?>
    </title>
</head>
<body>

    <div stytle="font-family:arial;">
        <h1>Welcome to my Framework!</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In, possimus harum commodi fuga placeat, nemo magni eius ducimus deserunt, natus quaerat. Temporibus architecto doloribus ea quos, recusandae velit culpa adipisci.</p>
        
        <form action="ExampleController/" method="POST">
            <label>Name: </label>
            <input type="text" name="name"><br>
            <label>Email: </label>
            <input type="text" name="email"><br>
            <label>Senha: </label>
            <input type="text" name="password"><br>
            <button type="submit">Submit</button>
        </form>

        <!--RECEIVE VARIABLES DATA ARRAY FROM EXEMPLECONTROLLER.PHP -->
        <h4>RECEIVED VARIABLES DATA ARRAY FROM EXEMPLECONTROLLER.PHP</h4>
        <p>
            <?php if(isset($data)){print_r($data);}; ?>
        </p>

        <!--RECEIVE VARIABLE KEY ARRAY BODY FROM EXEMPLECONTROLLER.PHP -->
        <?php     
            if(isset($data['body'])){
                echo "<h4>RECEIVE VARIABLE KEY ARRAY BODY FROM EXEMPLECONTROLLER.PHP</h4><p>";
                echo $data['body'];
            }; ?>
        </p>

        <!--RECEIVE FETCH ALL DATA FROM EXEMPLECONTROLLER.PHP -->
        <h4>RECEIVE FETCH ALL DATA FROM EXEMPLECONTROLLER.PHP</h4>
        <p>
            <?php

                foreach($data as $user ):
                    echo "<hr>";
                    echo $user->name . "<br>";
                    echo $user->email . "<br>";
                    echo $user->password . "<br>";
                    echo "<hr>";
                endforeach;

            ?>
        </p>

        <h4>RECEIVE FETCH FROM EXEMPLECONTROLLER.PHP</h4>
        <p>
            <?php
                print_r($user->name);
            ?>
        </p>

    </div>
    
</body>
</html>