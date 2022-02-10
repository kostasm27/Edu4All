<?php 
include_once 'db.connect.php';               //Used in order to connect with the course db//

if (isset($_POST["submit"])){                //Checks if the user used the proper way to access this page , only through searching  for a subject//
     
    $search=mysqli_real_escape_string($connect,$_POST["search"]);                                                           //Security measure for db infiltrations //
    $search2=strtoupper($search);                                                                                           //Takes the user's search input and transforms it to UpperCase , will be used in SQL query//
    $search3=strtolower($search);                                                                                           //Takes the user's search input and transforms it to LowerCase , will be used in SQL query//
    $query= "SELECT * FROM courses WHERE Title='$search' OR Title='$search2' OR Title='$search3'";                          //Checks if the search input matches any title of subject in db , also checks for UpperCase and LowerCase// 
    $result=mysqli_query($connect,$query);
    $row=mysqli_num_rows($result);
    if ($row>0){                                                     //If there is a hit, redirect to Courses_final.php while passing the subject's Title through $_GET['Title'] var//
        header("location: Courses_final.php?Title=$search");
        exit();
    }else{
        header("location: Courses.php?error=notexists");             //if not , show an error message alert//
        exit();
    }
}
else{
    header("location: Courses.php");
    exit();
}
?>

<link rel="stylesheet" href="searchBar.css">  

<?php  //***Used in order to alert the user for any error messages ( not avaiable subject )***//
function alert($message){
    echo"<script>alert('$message');</script>";
}
 
if (isset($_GET["error"])){
    if ($_GET["error"] == "notexists"){
        alert("This subject is currently unavailable!");
    }

}
?>

              <div class="search-bar">
                    <div class="search-title">Search</div>
                    <p class="search-par">Type the name of a subject you want to search!</p>
                    <div class="search-field">
                        <form action="Courses_Search.php" method="POST">
                        <input type="text" maxlength="50" class="search-input"  name="search" placeholder="Search">
                        <button type="submit" class="search-submit" name="submit"><svg style="width:24px;height:20px" viewBox="0 0 24 20"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                        </svg></button>
                        </form>
                    </div>
              </div>