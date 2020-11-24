<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter E-mail</label>";  
      }  
      else if(empty($_POST["address"]))  
      {  
           $error = "<label class='text-danger'>Enter Address</label>";  
      }
      else if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      }    
      else  
      {  
           if(file_exists('user_data.json'))  
           {  
                $current_data = file_get_contents('user_data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'email'          =>     $_POST["email"],  
                     'address'     =>     $_POST["address"],
                     'password'  =>     $_POST["password"]
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('user_data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
            <title>Append Data to JSON File using PHP</title>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            <meta charset="utf-8">
            <link rel="stylesheet" href="signup.css">
  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h2 style="color: rgb(240, 229, 76);text-decoration: underline;" align="">Sign up to seu-lanche</h2><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <a style="color: rgb(240, 229, 76);;font-size: x-large;">Name</a>
                     <br> 
                     <input type="text" name="name"  placeholder="Enter your name" class="form-control" /><br />  
                     <a style="color: rgb(240, 229, 76);;font-size: x-large;">E-mail</a>  <br>
                     <input type="text" name="email"  placeholder="Enter your E-mail" class="form-control" /><br />  
                     <a style="color: rgb(240, 229, 76);;font-size: x-large;"> Address</a>  <br>
                     <input type="text" name="address"  placeholder="Enter your address" class="form-control" /><br />
                     <a style="color: rgb(240, 229, 76);;font-size: x-large;">Password</a>  <br>
                     <input type="password" name="password"  placeholder="Enter your Password" class="form-control" /><br />  
                     <input type="submit" name="submit" value="Sign-up" class="btn btn-info" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                     
                    <p>Already Have an Account?</p>
                    <input type="button" class="btn" value="Log-in" onclick="location.href='login.html';">
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  