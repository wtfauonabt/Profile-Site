<html>
    <head>
    </head>
    <body>
        <form id='log_in' method='post' accept-charset='UTF-8'>
            <fieldset >
                <legend>Login</legend>
                <input type='hidden' name='submitted' id='submitted' value='1'/>

                <label for='user_name'>User Name*:</label>
                <br>
                <input type='text' name='user_name' id='user_name'  maxlength="30" />
                <br>
                <label for='user_pass'>Password*:</label>
                <br>
                <input type='password' name='user_pass' id='user_pass' maxlength="30" />
                <br>
                <label for='remb'>Remember Me (30 Days)</label>
                <br>
                <input type="checkbox" name="remb" value="remb" />
                <br>
                <input type='submit' name='Submit' value='Submit' />

            </fieldset>
        </form>
    </body>
</html>
