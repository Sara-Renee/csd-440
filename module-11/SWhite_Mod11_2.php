

<?php

//Sara White - CSD440 - Assignment 11.2

require('fpdf.php');


// Function to apply cell formatting on all table cells
function centeredCell($pdf, $width, $height, $text, $fill = false) {
    $pdf->Cell($width, $height, $text, 1, 0, 'C', $fill);
}

// Database connection information
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Retrieve music records
    $result = $conn->query("
        SELECT id, userName, musicActName, genre, favSong
        FROM SaraFavMusic
        ORDER BY id
    ");

    // Create the PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // PDF title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Favorite Music PDF', 0, 1, 'C');

    $pdf->Ln(5);

    // General information about the data
    $pdf->SetFont('Arial', '', 11);
    $pdf->MultiCell(0, 7,
        "This PDF displays data from a table in a MariaDB database. The table contains an ID for each record, as well as the user, their favorite musical act (could be a band or solo musical artist), the musical act's genre and the user's favorite song by the musical act. "
    );


    $pdf->Ln(8);

    // Table header
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(98, 36, 90); // Background color
    $pdf->SetTextColor(255, 255, 255); // White text

    centeredCell($pdf, 10, 10, 'ID', true);
    centeredCell($pdf, 20, 10, 'User', true);
    centeredCell($pdf, 40, 10, 'Musical Act', true);
    centeredCell($pdf, 45, 10, 'Genre', true);
    centeredCell($pdf, 75, 10, 'Favorite Song', true);

    $pdf->Ln();
   
    

    // Table data
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0); // Reset to black text

    while ($row = $result->fetch_assoc()) {

        centeredCell($pdf, 10, 10, $row["id"]);
        centeredCell($pdf, 20, 10, $row["userName"]);
        centeredCell($pdf, 40, 10, $row["musicActName"]);
        centeredCell($pdf, 45, 10, $row["genre"]);
        centeredCell($pdf, 75, 10, $row["favSong"]);

        $pdf->Ln();
    }
 
    // Table footer
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(
        190, 10, 'Total Records: ' . $result->num_rows,1, 1, 'C'
    );

    // Close database connection
    $conn->close();

    // Display the PDF in the browser
    $pdf->Output('I', 'SWhite_CSD440-Mod11_2.pdf');

} catch (mysqli_sql_exception $e) {
    // Display an error if the database operation fails
    echo "Database error: " . $e->getMessage();
}



/*
References

FPDF. (n.d.). Documentation. https://www.fpdf.org

*/
?>
