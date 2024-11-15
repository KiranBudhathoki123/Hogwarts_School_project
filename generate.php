<?php
require_once('fpdf/fpdf.php'); // Update the path to your fpdf.php file
require_once('connection.php');

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $stmt->close();

    if ($row) {
        $name = $row['name'];
        $house = $row['house'];

        // Create a new PDF instance
        $pdf = new FPDF();
        $pdf->AddPage();

        // Set font and size
        $pdf->SetFont('helvetica', '', 12);

        // Add image
        $imagePath = "resources/logooo.png";
        $imageWidth = 50;
        $pdf->Image($imagePath, ($pdf->GetPageWidth() - $imageWidth) / 2, 20, $imageWidth);

        // Calculate the height of the image and add a small margin (10 units) to set the Y position for the text
        $imageHeight = 100;
        $textY = $imageHeight;

        // Add content to the PDF (acceptance letter)
        $acceptanceLetter = "Dear $name,\nWe are pleased to inform you that you have been accepted at Hogwarts School of Witchcraft and Wizardry\nYou have been sorted to a house $house. Please find enclosed list of all necessary books and equipment. Term begins on September 1. We await your owl by no late than July 31\nYours Sincerely,\nMinerva Mcgonagall\nDeputy Headmistress";
        $pdf->SetY($textY);
        $pdf->MultiCell(0, 10, $acceptanceLetter);

        // Draw a rectangle for the ticket
        $pdf->Rect(20, $pdf->GetY() + 10, $pdf->GetPageWidth() - 40, 70); // Rectangle with x, y, width, height

        // Set font and size for the ticket details
        $pdf->SetFont('helvetica', '', 12);

        // Set the Y position for drawing the ticket details inside the rectangle
        $ticketTextY = $pdf->GetY() + 15;

        // Set the X position for drawing the ticket details inside the rectangle
        $ticketTextX = 25;
        // Add ticket details inside the rectangle
        $pdf->SetXY($ticketTextX,$ticketTextY);
        $pdf->Cell(0, 10, "Hogwarts School of Witchcraft and Wizardry", 0, 1, 'L');
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->SetX($ticketTextX);
        $pdf->Cell(0, 10, "TICKET TO HOGWARTS", 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetX($ticketTextX);
        $pdf->Cell(0, 10, "Name: $name", 0, 1, 'L');
        $pdf->SetX($ticketTextX);
        $pdf->Cell(0, 10, "House: $house", 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 15);
        $pdf->SetX($ticketTextX);
        $pdf->Cell(0,10, "Platform 9 3/4");
        // Output the PDF to the browser
        $pdf->Output("Hogwarts_Acceptance_Letter_and_Ticket_$name.pdf", 'D');
    } else {
        echo "Invalid email address or user not found";
    }
}
?>