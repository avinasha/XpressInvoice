<?php
App::import('Vendor','tcpdf/tcpdf');
App::import('Vendor','tcpdf/config/lang/eng');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('XpressInvoice');
$pdf->SetTitle('Generated Invoice');
$pdf->SetSubject('Generated Invoice');
$pdf->SetKeywords('XpressInvoice, Invoice');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
//$pdf->setLanguageArray($l); 
// ---------------------------------------------------------

// set font
$pdf->SetFont('freesans', '', 10);

// add a page
$pdf->AddPage();

if($Invoice['Invoice']['status']=='Estimate') { $temp='Estimate';} else {$temp='Tax Invoice';} 
$htmlcontent='<table><tr><td width="40%"></td><td width="20%"><h4>'.$temp.'</h4></td><td width="40%"></td></tr></table>';

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);
if(!empty($Invoice['Company']['address'])) $temp=$Invoice['Company']['address']; else $temp='';
if($Invoice['Invoice']['status']=='Estimate') $status='Estimate Number'; else $status='Invoice Number';
$subtable='<table>
			<tr>
				<td width="47%" style="text-align:right; font-size: normal; font-weight: bold;">'.$status.'</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: normal; font-weight: bold;">'.$Invoice['Invoice']['number'].'</td>
			</tr>';
if($Invoice['Invoice']['status']!='Estimate'){
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: normal; font-weight: bold;">Invoice Date</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: normal; font-weight: bold;">'.$Invoice['Invoice']['date'].'</td>
			</tr>';
			
	if(!empty($Invoice['Invoice']['ponumber'])){
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: normal; font-weight: bold;">PO Number</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: normal; font-weight: bold;">'.$Invoice['Invoice']['ponumber'].'</td>
			</tr>';
	}
	
	if(!empty($Invoice['Invoice']['podate'])){
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: normal; font-weight: bold;">PO Date</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: normal; font-weight: bold;">'.$Invoice['Invoice']['podate'].'</td>
			</tr>';
	}
	
	if(!empty($Invoice['Invoice']['dc'])){
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: normal; font-weight: bold;">Delivery Challan</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: normal; font-weight: bold;">'.$Invoice['Invoice']['dc'].'</td>
			</tr>';
	}
	
	if(!empty($Invoice['Invoice']['due'])){
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: normal; font-weight: bold;">Due On</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: normal; font-weight: bold;">'.$Invoice['Invoice']['due'].'</td>
			</tr>';
	}
}
$subtable.='</table>';
$htmlcontent='<table><tr><td width="50%"><div style="font-size: xx-large; font-weight: bold;">'.$Invoice['Company']['name'].'</div><div style="font-size: small;">'.$temp.'</div></td><td width="10%"></td><td width="40%">'.$subtable.'</td></tr></table>';

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);
if(empty($Invoice['Client']['company'])) $temp=$Invoice['Client']['name']; else $temp=$Invoice['Client']['company'];
if(!empty($Invoice['Client']['address'])) $temp1=$Invoice['Client']['address']; else $temp1='';
$htmlcontent='<table><tr><td><div style="font-size: small; font-weight: bold;">To,</div><div style="font-size: normal; font-weight: bold;">'.$temp.'</div><div style="font-size: small;">'.$temp1.'</div></td></tr></table>';

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

$htmlcontent='<table cellpadding="5">
				<tr style="font-size: small; font-weight: bold; background-color:#e6e6e6;">
					<th width="20%">Quantity</th><th width="43%">Description</th><th width="20%">Price</th><th width="17%">Total</th>
				</tr>';
foreach($Invoice['InvoiceItem'] as $item) {
	$price= $number->precision($item['price'],2).'/'.$item['type'];
	$total=$number->precision($item['quantity']*$item['price'],2);
	$echo='<tr style="font-size: small;">
					<td width="20%">'.$item['quantity'].'</td><td width="43%">'.$item['description'].'</td><td width="20%">'.$price.'</td><td width="17%">'.$total.'</td>
			</tr>';
	$htmlcontent.=$echo;
}
$htmlcontent.='</table><span style="color:#e0e0e0">___________________________________________________________________________________________</span>';
// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);
$total=$number->precision($Invoice['Invoice']['total'],2);
$amount=$number->precision($Invoice['Invoice']['amount'],2);
$subtable='<table>
			<tr>
				<td width="47%" style="text-align:right; font-size: small; font-weight: bold;">Sub Total</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: small; font-weight: bold;">'.$total.'</td>
			</tr> ';
if(!empty($Invoice['Invoice']['discount'])) {
	$temp=($Invoice['Invoice']['total']*$Invoice['Invoice']['discount'])/100;
	$val=$number->precision($temp,2);
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: x-small; font-weight: bold;">Discount('.$Invoice['Invoice']['discount'].'%)</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: x-small; font-weight: bold;">- '.$val.'</td>
				</tr>';
}
if(!empty($Invoice['Invoice']['tax1'])) {
	$temp=($Invoice['Invoice']['total']*$Invoice['Invoice']['tax1'])/100;
	$val=$number->precision($temp,2);
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: x-small; font-weight: bold;">'.$Invoice['Invoice']['tax1name'].'('.$Invoice['Invoice']['tax1'].'%)</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: x-small; font-weight: bold;">+ '.$val.'</td>
				</tr>';
}
if(!empty($Invoice['Invoice']['tax2'])) {
	$temp=($Invoice['Invoice']['total']*$Invoice['Invoice']['tax2'])/100;
	$val=$number->precision($temp,2);
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: x-small; font-weight: bold;">'.$Invoice['Invoice']['tax2name'].'('.$Invoice['Invoice']['tax2'].'%)</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: x-small; font-weight: bold;">+ '.$val.'</td>
				</tr>';
}
if(!empty($Invoice['Invoice']['shipping'])) {
	$val=$number->precision($Invoice['Invoice']['shipping'],2);
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: x-small; font-weight: bold;">Shipping</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: x-small; font-weight: bold;">+ '.$val.'</td>
				</tr>';
}
if(!empty($Invoice['Invoice']['roundoff'])) {
	$subtable.='<tr>
				<td width="47%" style="text-align:right; font-size: x-small; font-weight: bold;">Round Off</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: x-small; font-weight: bold;">+ '.$Invoice['Invoice']['roundoff'].'</td>
				</tr>';
}
$subtable.='
			<tr>
				<td width="47%" style="text-align:right; font-size: normal; font-weight: bold;">Total</td>
				<td width="6%"></td>
				<td width="47%" style="text-align:left; font-size: normal; font-weight: bold;">'.$amount.' '.$CurS.'</td>
			</tr>
			</table>';
$htmlcontent='<table><tr><td width="60%"></td><td width="40%">'.$subtable.'</td></tr></table>';

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

$htmlcontent='<table><tr><td width="100%"><div style="font-size: small; font-weight: bold;">'.$InWords.'</div></td></tr></table>';

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

$htmlcontent='<table cellpadding="5" style="font-size: xx-small; font-weight:bold; background-color:#eeeeee;"><tr><td>'.$Setting['Setting']['taxids'].'<div>'.$Invoice['Invoice']['notes'].'</div></td></tr></table>';

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

$htmlcontent='<br/><br/><br/><table><tr><td width="70%"></td><td width="25%" style="text-align:center; font-size: x-small; font-weight:bold;">________________________________<br/>(Signature)</td><td width="5%"></td></tr></table>';

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$file=$Invoice['Invoice']['id'].'.pdf';
$pdf->Output($file, 'I');

//============================================================+
// END OF FILE                                                 
//============================================================+
?>