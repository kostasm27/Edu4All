<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
        <title>Edu4All</title>
        <link rel="icon" href="images/logo1.png">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="navigationBar.css">
        <link rel="stylesheet" href="footer.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        
       
     </head>
     <body>
       
        <section class="NavigationBar">
            <nav>
               <a href="../Home page/index.php"><img src="images/logo1.png"></a>
               <div class="nav-bar">
                   <ul>
                       <li><a href="../Dashboard/index.php">Courses</a></li>
                       <li><a href="../News/main-1.php">News</a></li>
                       <li><a href="../Contact/index.php">Contact</a></li>
                       <li><a href="../Login/login.php">Login/Register</a></li>
                    </ul>
                </div>
             </nav> 
         </section>

         <section class="Login">
             <div class="form-box">
                 <div class="login-title">
                     <h1 class="inside-login">Login to continue</h1>
                 </div>
                 <form class="login-bar" action="../includes/login.inc.php" method="POST">
                     <input type="email" class="input-field" name='email' id='email' placeholder="Email" required >
                     <input type="password" class="input-field" name="password" id='password' placeholder="Password" required>
                     <br></br>
                     <input type="checkbox" class="check-box" name="remember"><span>Remember Password</span>
                     <button type="submit" class="submit-button" name="submit">Log in</button>
                     <div class="forgot">
                         <a href="../Forgot/forgot.php">Forgot Password?</a> 
                     </div>
                     <div class="register">
                        <p>Don't have an account?<a href="../Register/register.php"> Register here</a>.</p>
                      </div>
                 </form>
             </div>
          </section>

          
          
          <footer class="footer-container">
             <div class="footer-items-wrapper">
                 <div class="footer-item-wrapper">
                    <div class="footer-img-background" style="background-image:url(images/photo3.jpg)" ></div>
                        <div class="inside">
                          <h1 class="info-header">About us</h1>
                          <p class="info-par">This website was developed by a team of 4 collegue students.Our main vision is to provide equal educational opportunities ,helping those in need of need, aspiring to eradicate inequality and inequity! </p>
                          <p class="info-par">©PSPI. 2021.</p>                        
                        </div>
                </div>
              
                
              
                <div class="footer-item-wrapper">
                    <div class="footer-img-background" style="background-image:url(images/photo5.jpg)"></div>
                       <div class="inside">
                           <h1 class="info-header">Contact us</h1>
                           <div class="details">
                               <p class="details-par">Email: info@Edu4All<br><br>
                               Tel : +(30) 696 9696969 <br><br>
                               Address: Aristotle U,GR<br><br>
                               Website: Edu4All.info</p>
                            </div>
                       </div>                    
                </div>
              </div>
          </footer> 

          <?php   //***Used in order to check if there is an active cookie***//
                    
                    if  (isset($_COOKIE['email']) && isset($_COOKIE['pwrd'])){
                        $email=$_COOKIE['email'];
                        $password=$_COOKIE['pwrd'];
                        echo "<script>
                                document.getElementById('email').value='$email';
                                document.getElementById('password').value='$password';
                        </script>";
                    } 
          ?>
          <?php  //***Used in order to alert the user for any error messages ( wrong password , account not registered or failed query )***//
                function alert($message){
                    echo"<script>alert('$message');</script>";
                }
                 
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "notexists"){
                        alert("Account not registered!");
                    }
                    elseif ($_GET["error"] == "wronginput") {
                        alert("Wrong password!");
                    }
                    elseif ($_GET["error"] == "failedquery"){
                        alert("Invalid , try again !"); 
                    }
                }
                
                //***Used as a comfirmation for the reset of your password in case you lost access***//

                if (isset($_GET["reset"])){
                    if ($_GET["reset"] == "successfull"){
                        alert("Check your email");
                    }
                    elseif ($_GET["reset"] == "unsuccessfull") {
                       alert("Something went wrong!Please retry!"); 
                    }
                }
                   
                    

            ?>
    
      
   </body>


<script> //***Used for the animation on footer***//
         const items=document.querySelectorAll(".footer-item-wrapper"); 
         
         items.forEach( x => {
             x.addEventListener('mouseover' , ()=> {
                x.childNodes[1].classList.add('image-dark');
           });

           x.addEventListener('mouseout' , ()=> {
                x.childNodes[1].classList.remove('image-dark');
           });
          });
         
</script>


<script> //***Changes the ".Login" background-image every 1000 millieseconds***// 

    let item=document.querySelector('.Login');
    
    var back_img = new Array (  'url(images/photo1.jpg)' , 'url(images/photo2.jpg)' );
    
    var current=0;

    function changeImg () {
        current++;
        current = current % back_img.length;
        item.style.backgroundImage = back_img[current];
    }

    setInterval(changeImg,10000);

    item.style.backgroundImage = back_img[0];


</script>


</html>