<?php
function fetch_data()
{
$output = '';
$conn = mysqli_connect('localhost', 'root', '', 'test_db');
$sql = "SELECT * FROM users ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
$output .= '<tr>
				<td style="text-align: center; padding-top: 10px; padding-bottom: 10px;">'.$row['id'].'</td>
				<td style="text-align: center; padding-top: 10px; padding-bottom: 10px;">'.$row['username'].'</td>
				<td style="text-align: center; padding-top: 10px; padding-bottom: 10px;">'.$row['password'].'</td>
				<td style="text-align: center; padding-top: 10px; padding-bottom: 10px;">'.$row['email'].'</td>
</tr>';
}
return $output;
}
if(isset($_POST["generate_pdf"])){
require_once('C:\xampp\htdocs\act5\tcpdf_min\tcpdf.php');
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator (PDF_CREATOR);
$obj_pdf->SetTitle ("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");
$obj_pdf->SetHeaderData("", "", PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->SetHeaderFont(Array (PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->SetFooterFont(Array (PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
$obj_pdf->SetPrintHeader(false);
$obj_pdf->SetPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('helvetica', '', 11);
$obj_pdf->AddPage();
$content = '';
$content .='
<h4 align="center">Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4> <br />
<table border="1" cellspacing="O" cellpadding="3">
<tr>
<th>ID</th>
<th>Username</th>
<th>Password</th>
<th>Email</th>
</tr>
';
$content .= fetch_data();
$content .= '</table>';
$obj_pdf->writeHTML($content);
$obj_pdf->Output('file.pdf', 'I');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Activity 6</title>


<style>

body{
   

   background: rgb(253,247,247);
 }
 table tr:hover{ 
   cursor:pointer; 
   
   } 
 table thead { 
   background: rgb(168,66,35);
   margin-top: 40px; 
   }
 table thead tr th {
   color: whitesmoke; 

   }
 table tr td{
   color: black;
   
   font-family: Bahnschrift SemiCondensed;
   
 }


   
</style>
</head>
<body>
<br />
<h4 align="center" style="font-family: sans-serif; font-weight: bold; font-size: 30px;">Generate HTML Table Data to PDF from MySQL Database Using TCPDF in PHP</h4>
<div class="container" style="margin-left: 300px; margin-right: 300px;">
<div class="table-responsive">
<div class="col-md-12">
</div>
<br/>
<br/>
    <table class="table table-bordered table-hover"> 
      <thead> 
        <tr>
          <th style="width: 4%; padding-top: 10px; padding-bottom: 10px; font-family: sans-serif;">ID</th> 
          <th style="width: 10%; padding-top: 10px; padding-bottom: 10px; font-family: sans-serif;">Username</th> 
          <th style="width: 18%; padding-top: 10px; padding-bottom: 10px; font-family: sans-serif;">Password</th> 
          <th style="width: 10%; padding-top: 10px; padding-bottom: 10px; font-family: sans-serif;">Email</th> 
          
        </tr> 
      </thead> 
<?php
echo fetch_data();
?>
</table>
<br>
<br>
<form method="post">
<input type="submit" name="generate_pdf" style=" background-color: black; color: white; border-color: white; border-radius: 7px; float: right; height: 35px; width: 170px; font-family: sans-serif; font-weight: bolder;" class="btn btn-success" value="GENERATE PDF" />
</form>

</div>
</div>
</body>
</html>
