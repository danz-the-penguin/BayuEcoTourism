<!-- Login Popup -->
<div id="login-popup" class="login-popup">
    <span class="close-btn" onclick="closeLoginPopup()">&times;</span>
    <h3>User Login </h3>
    <form action="userAuth/login_action.php" method="post">
        <label for="userEmail">User Email:</label><br>
        <input type="email" id="userEmail" name="userEmail" required><br><br>
        
        <label for="userPwd">Password:</label><br>
        <input type="password" id="userPwd" name="userPwd" required maxlength="8" autocomplete="off"><br><br>
        
        <input type="submit" value="Login">
        <input type="reset" value="Reset"></br>
    </form>
    <p><a href="javascript:void(0);" onclick="openRegPopup();">| Registration </a> | Forgot Password |</p>
</div>
<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeLoginPopup();"></div>
<!-- End Login Popup -->
<!-- Registration Popup -->
<div id="reg-popup" class="reg-popup">
    <span class="close-btn" onclick="closeRegPopup()">&times;</span>
    <h3>User Registration </h3>
    <form action="userAuth/register_action.php" method="post">
        <label for="userName">Username:</label><br>
        <input type="text" id="userName" name="userName" required><br><br>
        
        <label for="userEmail">User Email:</label><br>
        <input type="email" id="userEmail" name="userEmail" required><br><br>
        
        <label for="userPwd">Password:</label><br>
        <input type="password" id="userPwd" name="userPwd" required maxlength="8"><br><br>
        
        <label for="confirmPwd">Confirm Password:</label><br>
        <input type="password" id="SconfirmPwd" name="confirmPwd" required><br><br>
        
        <input type="submit" value="Register">
        <input type="reset" value="Reset"></br>
    </form>
</div>
<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeRegPopup()"></div>
<!-- End Registration Popup -->

<!-- Edit Popup -->
<div id="edit-popup" class="edit-popup">
    <span class="close-btn" onclick="closeEditPopup()">&times;</span>
    <h3>Edit Profile </h3>
    <form action="userAuth/editProfile.php" method="post">
        <label for="userName">Username:</label><br>
        <input type="text" id="userName" name="userName" required><br><br>
        
        <label for="userEmail">User Email:</label><br>
        <input type="email" id="userEmail" name="userEmail" required><br><br>
        
        <label for="userPwd">New Password:</label><br>
        <input type="password" id="userPwd" name="userPwd" required maxlength="8"><br><br>
        
        <label for="confirmPwd">Confirm Password:</label><br>
        <input type="password" id="confirmPwd" name="confirmPwd" required><br><br>
        
        <input type="submit" value="Update">
        <input type="reset" value="Reset"></br>
    </form>
</div>
<!-- Overlay -->
<div id="edit-overlay" class="overlay" onclick="closeEditPopup();"></div>
<!-- End Edit Popup -->