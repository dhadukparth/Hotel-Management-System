<?php

    session_start();
    include "./include/connection.php";
    // $fnm = $_SESSION['pdfname'];
    // $lnm = $_SESSION['pdflname'];

    $fnm = "parth";
    $lnm = "dhaduk";
    if($fnm == "" or $lnm == "")
    {
        header("location: booking.php");
    }
    else
    {
        $featchquery = "SELECT * FROM `customer_details` WHERE fname='$fnm' AND lname='$lnm' ";
        $featchquery__result = mysqli_query($con,$featchquery);
        $r = mysqli_fetch_array($featchquery__result);
        $rno = $r['room_no'];
        $rtype = $r['room_type'];
        $checkin = $r['checkin'];
        $checkout = $r['checkout'];
        $member = $r['member'];
        $childre = $r['children'];
        $mobile = $r['mobile'];
        $email = $r['email'];
        $address = $r['address'];
        $price = $r['price'];


        require('fpdf184/fpdf.php');

        class PDF extends Fpdf
        {
            // Page header
            function Header()
            {

                // Arial bold 15
                $this->SetFont('Arial','B',30);

                // Color
                $this->SetTextColor(255,0,0);

                // Move to the right
                $this->Cell(80);

                // Title
                $this->Cell(30,10,'IMPERIAL HOTEL - Rajkot',0,0,'C');

                $this -> Line(0, 25, 250, 25);

                // Line break
                $this->Ln(20);

            }

        }
        


        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetTitle('Customer Room Booking Information | Imperial Hotel - Rajkot');
        $pdf->SetFont('Times','',15);


        // Title
        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,30,'First Name :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,30,$fnm,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,0,'Last Name :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,0,$lnm,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(50,30,'Room Number :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,30,$rno,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(45,0,'Room Type :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,0,$rtype,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(45,30,'CheckIn Date :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,30,$checkin,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(50,0,'CheckOut Date :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,0,$checkout,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,30,'Member :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,30,$member,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,0,'Children :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,0,$childre,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,30,'Room Price :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,30,$price,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,0,'Mobile :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(20,0,$mobile,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,30,'Email :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(40,30,$email,0,0,'L');
        $pdf->ln();

        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(40,0,'Address :-',0,0,'L');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(40,0,$address,0,0,'L');
        $pdf->ln(35);


        $pdf->Line(0, 240, 250, 240);
        $pdf->SetFont('Arial','B',35);

        $pdf->SetTextColor(255,0,0);
        $pdf->Cell(190,30,'Thanks For Booking',0,0,'C');

        $pdf->Output('Imperial Hotel.pdf','D');

        unset($_SESSION['pdfname']);
        unset($_SESSION['pdflname']);
    }
?>