<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edu4All</title>
        <link rel="icon" href="images/logo1.png">
        <link rel="stylesheet" href="navigationBar.css">
        <link rel="stylesheet" href="forgot.css"> 
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">  
    </head>
    <body>

        <section class="NavigationBar">
            <nav>
               <a href="../Home page/index.php"><img src="images/logo1.png"> </a>
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


         <section class="forgot">

            <div class="form-box">
                 
                <img src="images/logo2.png" class="img-forgot" >
               
                <form class="forgot-bar" action="../includes/forgottenpassword.inc.php" method="POST">
                   <h3 class="forgot-header">Having trouble signing in?</h3>
                   <p class="forgot-par">Let us help you regain your access! </p>
                   <div class="forgot-cat">
                      <input type="email" class="input-field" placeholder="Email" name='email'  required >
                      
                   </div>
                   <button type="submit" name="submit-button" class="submit-button">Submit</button>
                   <div class="questions">
                      <p class="questions-par">For further questions you can always email us:</p>
                      <p class="questions-email">info@Edu4All<br><br></p>
                  </div>
                </form>

               
             </div>

             <div class="footer">
                <p class="footer-par">©PSPI. 2021.</p>
             </div>

        </section>

        

    </body>

    <script> //***Changes the ".forgot" background-image every 1000 millieseconds***// 

        let item=document.querySelector('.forgot');
        
        var back_img = new Array (  'url(images/photo1.jpg)' , 'url(images/photo2.jpg)'  );
        
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