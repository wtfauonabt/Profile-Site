<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

    	<h2>
	    	<?php
	    		echo "Account ID: " . $_SESSION['acc_id'] . " ";
	    		echo "Account Balance: " . $acc_bal . "<br>";
	    	?>
	    </h2>

	    <!-- Add Form -->
    	<form id='add' action='?model=transaction&action=add' method='post' accept-charset='UTF-8'>
            <fieldset >
                <legend>Add:</legend>
                <input type="hidden" name="submitted" id="submitted" value="1"/>

                <label for="tran_type">Type:</label>
                <select type="text" name="tran_type" id="tran_type">
                    <option value="">-Select-</option>
                    <option value="d">Deposit</option>
                    <option value="w">Withdraw</option>
                </select>

                <label for="tran_bal" >Amount:</label>
                <input type="number" name="tran_bal" id="tran_bal" step="any" />

                <input type="submit" name="Submit" value="Submit" />

            </fieldset>
        </form>
        <br>

        <!-- Display Table -->
        <table style = "width:100%" border="1">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Deposit</th>
                    <th>Withdraw</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($n=0; $n < $n_row; ++$n) {
                    echo "<tr><td>" .  $table[$n]->getId() . "</td>";
                    if ($table[$n]->getType() == 'd' || $table[$n]->getType() == 'D') {
                    	echo "<td>" . $table[$n]->getBal() . "</td>";
                    	echo "<td></td>";
                    } else {
                    	echo "<td></td>";
                    	echo "<td>" . $table[$n]->getBal() . "</td>";
                    }
                } ?>
            </tbody>
        </table>
    </body>
</html>
