<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

        <a href="?model=account&action=add"><button name="add" type="submit" value="add">Add New Account</button></a>
        <br><br>

        <form id='filter' method='post' accept-charset='UTF-8'>
            <fieldset >
                <legend>Filter:</legend>
                <input type="hidden" name="submitted" id="submitted" value="1"/>

                <label for="field" >Field:</label>
                <select type="text" name="field" id="field">
                    <option value="">-Select-</option>
                    <option value="acc_id">Account ID</option>
                    <option value="acc_bal">Account Bal</option>
                </select>

                <label for="value" >Value:</label>
                <input type="text" name="value" id="value" maxlength="50" />

                <input type="submit" name="Submit" value="Submit" />

            </fieldset>
        </form>
        <br>

        <table style = "width:100%" border="1">
            <thead>
                <tr>
                    <th><a href="?model=account&action=sort&field=acc_id">Account ID</a></th>
                    <th><a href="?model=account&action=sort&field=acc_bal">Account Balance</a></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($n=0; $n < $n_row; ++$n) {
                    echo "<tr><td><span><a href=\"?model=transaction&action=view&acc_id=" . $table[$n]->getId() . "\">" . $table[$n]->getId() . "</a></span></td>";
                    echo "<td>" . $table[$n]->getBal() . "</td>";
                    echo "<td><a href=\"?model=account&action=delete&acc_id=" . $table[$n]->getId() . "\">Delete</a></td></tr>";
                } ?>
            </tbody>
        </table>
    </body>
</html>
