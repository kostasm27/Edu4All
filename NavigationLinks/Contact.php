<!DOCTYPE html>
<html>
<?php
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All</title>
    <link rel="stylesheet" type="text/css" href="../Contact/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include '../Nav and footer/navigationBar.php';?>

    <section class="ContactUs">
        <div class="ImagePart"></div>
        <div class="MessagePart">
            <h1>CONTACT US</h1>

        </div>
        <div class="TextPart">

            <h1>Need Help?</h1>
            <p>We would love to respond to all your queries.
                Feel free to get in touch with us!
            </p>
        </div>

        <div class="Container">
            <div class="Box">

                <div class="LeftBox">
                    <h1>Send us your question</h1>
                    <form action="help.php" method="POST">
                        <?php if (isset($_GET['success'])) { ?>
                        <p class="success"
                            style="background: #D4EDDA;  color: #40754C;  padding: 10px;  width: fit-content;   border-radius: 5px;  margin: 0px 7px 7px 0px;">
                            <?php echo $_GET['success']; ?>
                        </p>
                        <?php } ?>
                        <?php if (isset($_GET['fail'])) { ?>
                        <p class="fail"
                            style="  background-color: rgb(255, 69, 69);  color: white;  padding: 10px;  width: fit-content;   border-radius: 5px;  margin: 0px 7px 7px 0px;">
                            <?php echo $_GET['fail']; ?>
                        </p>
                        <?php } ?>
                        <div class="InputRow">
                            <div class="InputGroup">
                                <label>Name</label>
                                <input type="text" name="Name" id='Name' placeholder="Nick" required='required'>

                            </div>

                        </div>

                        <div class="InputRow">
                            <div class="InputGroup">
                                <label>E-mail</label>
                                <input type="email" name="Email" id="Email" placeholder="nick99@gmail.com"
                                    required='required'>

                            </div>

                        </div>

                        <div class="InputRow">
                            <div class="InputGroup">
                                <label>Subject</label>
                                <input type="text" name="Subject" id="Subject" placeholder="How Courses Work?"
                                    required='required'>

                            </div>

                        </div>

                        <label>Message</label>
                        <textarea rows="5" placeholder="Your Message" id="Message" name="Message"
                            required='required'></textarea>
                        <button type="submit" id="Send" onclick="Message()" name="Send"
                            required='required'>SEND</button>
                    </form>
                </div>
                <div class="RightBox">
                    <h1>Contact Details</h1>

                    <table>
                        <tr>
                            <td>E-mail</td>
                            <td><br>edu4allinfo@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><br>+30 695555555</td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td><br>Aristotle University <br>Thessaloniki, Greece</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>