<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
    <title>Edu4All</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="../Login/navigationBar.css">
    <link rel="stylesheet" href="../Login/footer.css">


</head>

<body>
<section class="NavigationBar">
        
        <nav>
            <a href="/Website/main/NavigationLinks/HomePage.php"><img src="/Website/main/images/logo.png"> </a>
            <div class="nav-bar">
                <ul>
                    <li><a href="/Website/main/NavigationLinks/Courses.php">Courses</a></li>
                    <li><a href="/Website/main/NavigationLinks/NewsPage1.php">News</a></li>
                    <li><a href="/Website/main/NavigationLinks/Contact.php">Contact</a></li>
                    <li><a href="/Website/main/NavigationLinks/Login.php">Login/Register</a></li>
                </ul>
            </div>
        </nav>
    </section>
    


    <section class="Login">
        <div class="form-box">
            <div class="login-title">
                <h1 class="inside-login">Login to continue</h1>
            </div>
            <form class="login-bar" method="POST">
                <input type="email" class="input-field" placeholder="Email" required name="email">
                <input type="password" class="input-field" placeholder="Password" required name="password">
                <br></br>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-button">Log in</button>
                <div class="forgot">
                    <a href="../forgot/forgot.php">Forgot Password?</a>
                </div>
                <div class="register">
                    <p>Don't have an account?<a href="../register/register.php"> Register here</a>.</p>
                </div>
            </form>
        </div>
    </section>



    <footer class="footer-container">
        <div class="footer-items-wrapper">
            <div class="footer-item-wrapper">
                <div class="footer-img-background" style="background-image:url(../images/photo4.jpg)"></div>
                <div class="inside">
                    <h1 class="info-header">About us</h1>
                    <p class="info-par">This website was developed by a team of 4 collegue students.Our main vision is
                        to provide equal educational opportunities ,helping those in need of need, aspiring to eradicate
                        inequality and inequity! </p>
                    <p class="info-par">©PSPI. 2021.</p>
                </div>
            </div>



            <div class="footer-item-wrapper">
                <div class="footer-img-background" style="background-image:url(../images/photo7.jpg)"></div>
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


</body>


<script>
    const items = document.querySelectorAll(".footer-item-wrapper");

    items.forEach(x => {
        x.addEventListener('mouseover', () => {
            x.childNodes[1].classList.add('image-dark');
        });

        x.addEventListener('mouseout', () => {
            x.childNodes[1].classList.remove('image-dark');
        });
    });

</script>


<script>

    let item = document.querySelector('.Login');

    var back_img = new Array('url(../images/photo9.jpg)', 'url(../images/photo4.jpg)', 'url(../images/photo3.jpg)');

    var current = 0;

    function changeImg() {
        current++;
        current = current % back_img.length;
        item.style.backgroundImage = back_img[current];
    }

    setInterval(changeImg, 10000);

    item.style.backgroundImage = back_img[0];


</script>


</html>