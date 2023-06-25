<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chat</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <section class="form_signup">MyChat
       <form action="#" enctype="multipart/form-data">
        <div class="detail">
            <div class="error_text"></div>

            <div class="login_details input">
                <label>First Name</label>
                <input type="text" name="fname" placeholder="i.e. Tanya" required>
            </div>


            <div class="login_details input">
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="i.e. Mishra" required>
            </div>
        </div>


        <div class="login_details input">
            <label>E-mail</label>
            <input type="email" name="email" placeholder="abc@gmail.com" required>
        </div>


        <div class="login_details input">
            <label>Password</label>
            <input type="password"  name="password" placeholder="#23@12udi#" required>
        </div>


        <div class="login_details input">
            <label>Select Image</label>
            <input type="file" name="image" required>
        </div>


        <div class="submit login_details button input">
            <input type="button" id="button" value="Continue to Chat">
        </div>


        </section>

        <div class=" link">Already signed up? <a href="login_page.php">Login now</a></div>

       </form>
      
    </div>

    <script src="javascript/signup.js"></script>
</body>
</html>