<?php 
		include "../db_connection.php";
		require('fpdf.php');
		
					$pdf = new FPDF();
					$pdf->AddPage();
					$pdf->SetDrawColor(165,165,165);
					
					$pdf->SetFont('Helvetica','B',12);							

					$pdf->Cell(190,5,"Address Book",0,0,'C');
					
					$pdf->SetFont('Helvetica','B',9);							
					
					$pdf->Cell(190,10,"",0,1,'C');
					$pdf->Cell(50,5,"Last Name",0,0,'L');
					$pdf->Cell(50,5,"First Name",0,0,'L');
					$pdf->Cell(40,5,"Phone",0,0,'L');
					$pdf->Cell(40,5,"Email",0,1,'L');
					
					$pdf->SetFont('Helvetica','',8);
					
					$query_string = "SELECT * FROM contacts";
					$result = $mysqli->query($query_string);
					while($row = $result->fetch_assoc()){
						$lastName = $row['lastName'];
							$lastName = utf8_decode($lastName);
						$firstName = $row['firstName'];
							$firstName = utf8_decode($firstName);
						$phone = $row['phone'];
						$email = $row['email'];
						
						$pdf->Cell(50,5,$lastName,'T',0,'L');
						$pdf->Cell(50,5,$firstName,'T',0,'L');
						$pdf->Cell(40,5,$phone,'T',0,'L');
						$pdf->Cell(40,5,$email,'T',1,'L');
					}			
					
					$pdf->Output('I');		
		$mysqli->close();

?>