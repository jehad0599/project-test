<?php
       $call = mysqli_connect('localhost','root','','test2');
       $lang = array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES UTF8",);
   
       if( ! $call){
           die("Error : " . mysqli_connect_error());
       }else{
          if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name   = $_POST['name'];
            $age    = $_POST['age']; 
            $address  = $_POST['address']; 
            $email  = $_POST['email'];
            $gender  = $_POST['gender'];  
     
            $sql = "INSERT INTO student(name,age,address,email,gender) 
            VALUES('$name','$age','$address','$email','$gender')";
            $result = mysqli_query($call,$sql);

            if($result){
                echo "success";
            }else{
                die("Error : " . mysqli_error($call)); 
            }
          }

       }


       $nameErr = $ageErr = $addressErr = $emailErr = $genderErr = "";
       $name = $age = $address = $email = $gender = "";

       if ($_SERVER['REQUEST_METHOD'] == "POST"){
           if(empty($_POST["name"])){
               $nameErr = "Name is required";
            }else{
               $name = test_input($_POST["name"]);
            }

           if(empty($_POST["age"])){
            $ageErr = "Age is required";
            }else{
            $age = test_input($_POST["age"]);
            }

            if(empty($_POST["gender"])){
                $genderErr = "Gender is required";
            }else{
                $gender = test_input($_POST["gender"]);
            }

            if(empty($_POST["email"])){
                $emailErr = "Email is required";
            }else{
                $email = test_input($_POST["email"]);
            }
       }

       


       mysqli_close($call);
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<p>    
    name: <input type="text" name="name" require>
    <span class="error">* <?php echo $nameErr;?></span>
</p>

<p>
    age: <input type="number" name="age">
    <span class="error">* <?php echo $ageErr;?></span>
</p>

<p>
    address: <input type="text" name="address" require>
</p>

<p>
    email: <input type="text" name="email" require>
    <span class="error">* <?php echo $emailErr;?></span>
</p>

<p>
    gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <span class="error">* <?php echo $genderErr;?></span>
</p>

<p>
    <input type="submit" name='sub' value="أرسال">
</p>
</form>

