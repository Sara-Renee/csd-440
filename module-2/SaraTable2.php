<!--
Sara White - CSD440 - Assignment 2.2
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sara White Table Module 2.2</title>
    <!-- formatting for the table -->
    <style> 
    table {
        width: 800px;
        border-collapse: collapse;
    }

    td {
        padding: 15px;
        text-align: center;
        font-size: 20px;
    }
</style>
</head>

<body>

    <h1>Random Numbers</h1>
    <p> Each cell in this table contains a random number between 1 and 50. </p>

    <table border="1">

        <?php
        // outer loop to create the table rows
        for ($row = 0; $row < 8; $row++) {
        ?>

            <tr>
                <?php
                // inner loop to create the cells in each row
                for ($column = 0; $column < 8; $column++) {
                ?>

                    <td>
                        <?php
                        echo rand(1, 50); //random numbers between 1 and 50 to populate cells
                        ?>
                    </td>

                <?php
                }
                ?>
            </tr>

        <?php
        }
        ?>

    </table>

</body>

</html>