<div data-role="popup" id="popupLogin" class="ui-corner-all">
    <form data-ajax="false" method="post" action="index.php">
        <div style="padding:10px 20px;">
            <h3>ล็อคอินเข้าสู่ระบบ</h3>
            <label>Username:</label>
            <input name="username" id="un" value="" placeholder="username" data-theme="a" type="text">
            <label>Password:</label>
            <input name="password" id="pw" value="" placeholder="password" data-theme="a" type="password">
            <input type="hidden" name="submit" value="submit" />
            <button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Sign in</button>
        </div>
    </form>
</div>
<?php


?>