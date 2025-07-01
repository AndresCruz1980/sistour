<?php

namespace App\Models;

use Codedge\Fpdf\Fpdf\Fpdf;

class Pdf extends Fpdf
{
    private $titulo = ''; 
    private $hoja = 'LEGAL'; 
    private $subTitulo = ''; 
    private $subTitulo2 = ''; 
    private $sucursal = ''; 
    private $direccion = '';
    private $logo = '';
    private $fechaEmision = '';
    private $usuarioEmision = '';
    private $orientacion = 'landscape'; 
    public $angle = 0;

    public function Header()
    {


        /*$this->SetFont('Arial','B',50);
        $this->SetTextColor(255,192,203);
        $this->RotatedText(35,190,'N O   V A L I D O',45);*/

        //$this->Image(base_path('public').'/logos/logo_insa.png', 165, 20, 26);
	    //$this->Image(base_path('public').'/logos/header2021.jpg', 20, 13, 110, 25);        
        /*if($this->logo){
            $this->Image($this->logo,8,2,70);
        }
        if($this->orientacion == 'landscape'){
            if($this->logo){
                if($this->hoja=='LEGAL'){
                }elseif($this->hoja=='LETTER'){
                   $this->SetFont('Arial','BI',8);
                   $this->Cell(225,5,iconv('UTF-8', 'windows-1252','Fecha de impresión:'),0,0,'R');//29
                   $this->SetTextColor(128,128,128);
                   $this->Cell(30,5,$this->fechaEmision,0,1,'L');
                   $this->SetTextColor(0,0,0);
                   $this->Cell(225,5,'Usuario:',0,0,'R');
                   $this->SetTextColor(128,128,128);
                   $this->Cell(30,5,iconv('UTF-8', 'windows-1252',$this->usuarioEmision),0,1,'L');                   
                }
            } 
        }elseif($this->orientacion=='portrait'){
            $this->SetFont('Arial','BI',8);
            $this->Cell(162,5,iconv('UTF-8', 'windows-1252','Fecha de impresión:'),0,0,'R');//29
            $this->SetTextColor(128,128,128);
            $this->Cell(30,5,$this->fechaEmision,0,1,'L');
            $this->SetTextColor(0,0,0);
            $this->Cell(162,5,'Usuario:',0,0,'R');
            $this->SetTextColor(128,128,128);
            $this->Cell(30,5,iconv('UTF-8', 'windows-1252',$this->usuarioEmision),0,1,'L');
        }   
        $this->Ln(2);
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','B',14);
        $this->Cell(0,8,iconv('UTF-8', 'windows-1252',$this->titulo),0,1,'C');
        if($this->subTitulo){
            $this->SetFont('Arial','B',10);
            $this->SetTextColor(0,0,0);
            $this->Cell(0,6,iconv('UTF-8', 'windows-1252',$this->subTitulo),0,1,'C');
        }
        if($this->subTitulo2){
            $this->SetFont('Arial','B',10);
            $this->SetTextColor(0,0,0);
            $this->Cell(0,6,iconv('UTF-8', 'windows-1252',$this->subTitulo2),0,1,'C');
        }        
        $this->Ln(2);*/
    }

    public function RotatedText($x, $y, $txt, $angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }  

    public function Rotate($angle,$x=-1,$y=-1)
    {
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0)
        {
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }
    
    public function _endpage()
    {
        if($this->angle!=0)
        {
            $this->angle=0;
            $this->_out('Q');
        }
        parent::_endpage();
    }  


    public function Footer()
    {
        /*$this->SetLineWidth(0.9);
        $this->SetDrawColor(150, 150, 150);
        $this->SetLineWidth(0.1);
		$this->Image(base_path('public'). '/logos/pieinsa.png', 15, 245,185,30);
        $this->SetXY(195, -18);
        $this->SetFont('Arial', 'I', 9);
        $this->SetTextColor(170, 170, 170);
        $this->Cell(0, 10, 'Pag. ' . $this->PageNo() . '/{nb}', 0, 0, 'C');*/
        //if ($this->fechaCreacion)
        //    $this->Cell(-320, 10, 'Fecha: ' . $this->fechaCreacion, 0, 0, 'C');        
        /*$this->SetY(-15);
        $this->SetFont('Arial','I',9);
        $this->SetDrawColor(0, 0, 0);
        $x = 7; $y = 200;
        $this->SetLineWidth(0.2);     
        $this->SetTextColor(128, 128, 128); 
        if($this->orientacion == 'landscape'){
            if($this->hoja=='LEGAL'){
                $this->Line($x, $y, 349, $y); 
                $this->Cell(270,6,iconv('UTF-8', 'windows-1252',$this->direccion),0,0,'L');
            }elseif($this->hoja=='LETTER'){
                $this->Line($x, $y, 272 , $y); 
                $this->Cell(185,6,iconv('UTF-8', 'windows-1252',$this->direccion),0,0,'L');            
            }
            $this->SetTextColor(0, 0, 0);   
            $this->Cell(72,6,iconv('UTF-8', 'windows-1252','Página ').$this->PageNo().'/{nb}',0,0,'R');
        }elseif($this->orientacion=='portrait'){//para letter
                $y = 264;
                $x = 12;
                $this->Line($x, $y, 204, $y); 
                $this->Cell(127,6,iconv('UTF-8', 'windows-1252',$this->direccion),0,0,'L');            
            $this->SetTextColor(0, 0, 0);   
            $this->Cell(60,6,iconv('UTF-8', 'windows-1252','Página ').$this->PageNo().'/{nb}',0,0,'R');
        }*/
    }

    public function setOrientacion($val){
        $this->orientacion = $val;
    }

    public function setSucursal($val){
        $this->sucursal = $val;
    }

    public function setTitulo($val){
        $this->titulo = $val;
    }

    public function setSubTitulo($val){
        $this->subTitulo = $val;
    } 
    
    public function setTitulo2($val){
        $this->titulo2 = $val;
    }

    public function setSubTitulo2($val){
        $this->subTitulo2 = $val;
    }    

    public function setFechaEmision($val){
        $this->fechaEmision = $val;
    }

    public function setUsuarioEmision($val){
        $this->usuarioEmision = $val;
    }

    public function setDireccion($val){
        $this->direccion = $val;
    }    
    
    public function setLogo($val){
        $this->logo = $val;
    }

    public function setHoja($val){
        $this->hoja = $val;
    }   
    
    public function WriteTable($tcolums, $columnsHeader = array()) {
        // go through all colums
        for ($i = 0; $i < sizeof($tcolums); $i++) {
            $current_col = $tcolums[$i];
            $height = 0;
    
            // get max height of current col
            $nb = 0;
            for ($b = 0; $b < sizeof($current_col); $b++) {
                // set style
                $this->SetFont($current_col[$b]['font_name'], $current_col[$b]['font_style'], $current_col[$b]['font_size']);
                $color = explode(",", $current_col[$b]['fillcolor']);
                $this->SetFillColor($color[0], $color[1], $color[2]);
                $color = explode(",", $current_col[$b]['textcolor']);
                $this->SetTextColor($color[0], $color[1], $color[2]);
                $color = explode(",", $current_col[$b]['drawcolor']);
                $this->SetDrawColor($color[0], $color[1], $color[2]);
                $this->SetLineWidth($current_col[$b]['linewidth']);
    
                $nb = max($nb, $this->NbLines($current_col[$b]['width'], $current_col[$b]['text']));
                $height = $current_col[$b]['height'];
            }
            $h = $height * $nb;
            // Issue a page break first if needed
            $this->CheckPageBreak($h, $columnsHeader);
    
            // Draw the cells of the row
            for ($b = 0; $b < sizeof($current_col); $b++) {
                $w = $current_col[$b]['width'];
                $a = $current_col[$b]['align'];
    
                // Save the current position
                $x = $this->GetX();
                $y = $this->GetY();
    
                // set style
                $this->SetFont($current_col[$b]['font_name'], $current_col[$b]['font_style'], $current_col[$b]['font_size']);
                $color = explode(",", $current_col[$b]['fillcolor']);
                $this->SetFillColor($color[0], $color[1], $color[2]);
                $color = explode(",", $current_col[$b]['textcolor']);
                $this->SetTextColor($color[0], $color[1], $color[2]);
                $color = explode(",", $current_col[$b]['drawcolor']);
                $this->SetDrawColor($color[0], $color[1], $color[2]);
                $this->SetLineWidth($current_col[$b]['linewidth']);
    
                $color = explode(",", $current_col[$b]['fillcolor']);
                $this->SetDrawColor($color[0], $color[1], $color[2]);
    
                $drawfill = ($current_col[$b]['drawfill']) ? $current_col[$b]['drawfill'] : 'FD';
                // Draw Cell Background
                $this->Rect($x, $y, $w, $h, $drawfill); //'FD' Llena background
    
                $color = explode(",", $current_col[$b]['drawcolor']);
                $this->SetDrawColor($color[0], $color[1], $color[2]);
    
                // Draw Cell Border
                if (substr_count($current_col[$b]['linearea'], "T") > 0) {
                    $this->Line($x, $y, $x + $w, $y);
                }
    
                if (substr_count($current_col[$b]['linearea'], "B") > 0) {
                    $this->Line($x, $y + $h, $x + $w, $y + $h);
                }
    
                if (substr_count($current_col[$b]['linearea'], "L") > 0) {
                    $this->Line($x, $y, $x, $y + $h);
                }
    
                if (substr_count($current_col[$b]['linearea'], "R") > 0) {
                    $this->Line($x + $w, $y, $x + $w, $y + $h);
                }
    
                // Print the text
                $this->MultiCell($w, $current_col[$b]['height'], $current_col[$b]['text'], 0, $a, 0);
    
                // Put the position to the right of the cell
                $this->SetXY($x + $w, $y);
            }
    
            // Go to the next line
            $this->Ln($h);
        }
    }
    
    // If the height h would cause an overflow, add a new page immediately
    public function CheckPageBreak($h, $columnsHeader = array()) {
        if ($this->GetY() + $h > $this->PageBreakTrigger){
            $this->AddPage($this->CurOrientation);
            if ($columnsHeader) {
                $this->WriteTable($columnsHeader);
            }		
        }	
    }
    
    // Computes the number of lines a MultiCell of width w will take
    public function NbLines($w, $txt) {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
        
    public function Justify($text, $w, $h) {
        $tab_paragraphe = explode("\n", $text);
        $nb_paragraphe = count($tab_paragraphe);
        $j = 0;
    
        while ($j < $nb_paragraphe) {
    
            $paragraphe = $tab_paragraphe[$j];
            $tab_mot = explode(' ', $paragraphe);
            $nb_mot = count($tab_mot);
    
            // Handle strings longer than paragraph width
            $k = 0;
            $l = 0;
            while ($k < $nb_mot) {
    
                $len_mot = strlen($tab_mot[$k]);
                if ($len_mot < ($w - 5)) {
                    $tab_mot2[$l] = $tab_mot[$k];
                    $l++;
                } else {
                    $m = 0;
                    $chaine_lettre = '';
                    while ($m < $len_mot) {
    
                        $lettre = substr($tab_mot[$k], $m, 1);
                        $len_chaine_lettre = $this->GetStringWidth($chaine_lettre . $lettre);
    
                        if ($len_chaine_lettre > ($w - 7)) {
                            $tab_mot2[$l] = $chaine_lettre . '-';
                            $chaine_lettre = $lettre;
                            $l++;
                        } else {
                            $chaine_lettre .= $lettre;
                        }
                        $m++;
                    }
                    if ($chaine_lettre) {
                        $tab_mot2[$l] = $chaine_lettre;
                        $l++;
                    }
                }
                $k++;
            }
    
            // Justified lines
            $nb_mot = count($tab_mot2);
            $i = 0;
            $ligne = '';
            while ($i < $nb_mot) {
    
                $mot = $tab_mot2[$i];
                $len_ligne = $this->GetStringWidth($ligne . ' ' . $mot);
    
                if ($len_ligne > ($w - 5)) {
    
                    $len_ligne = $this->GetStringWidth($ligne);
                    $nb_carac = strlen($ligne);
                    $ecart = (($w - 2) - $len_ligne) / $nb_carac;
                    $this->_out(sprintf('BT %.3F Tc ET', $ecart * $this->k));
                    $this->MultiCell($w, $h, $ligne);
                    $ligne = $mot;
                } else {
    
                    if ($ligne) {
                        $ligne .= ' ' . $mot;
                    } else {
                        $ligne = $mot;
                    }
                }
                $i++;
            }
    
            // Last line
            $this->_out('BT 0 Tc ET');
            $this->MultiCell($w, $h, $ligne);
            $tab_mot = '';
            $tab_mot2 = '';
            $j++;
        }
    }
    
    public function MultiCellJustify($w, $h, $txt, $border = 0, $align = 'J', $fill = false) {
        //Get bullet width including margins
        // $blt_width = $this->GetStringWidth($blt)+$this->cMargin*2;
        //Save x
        $bak_x = $this->x;
    
        //Output bullet
        // $this->Cell($blt_width,$h,$blt,0,'',$fill);
        //Output text
        $this->MultiCell($w, $h, $txt, $border, $align, $fill); //-$blt_width
        //Restore x
        $this->x = $bak_x;
    }
    
    public function MultiCellBlt($w, $h, $blt, $txt, $border = 0, $align = 'J', $fill = false) {
        //Get bullet width including margins
        $blt_width = $this->GetStringWidth($blt) + $this->cMargin * 2;
    
        //Save x
        $bak_x = $this->x;
    
        //Output bullet
        $this->Cell($blt_width, $h, $blt, 0, '', $fill);
    
        //Output text
        $this->MultiCell($w - $blt_width, $h, $txt, $border, $align, $fill);
    
        //Restore x
        $this->x = $bak_x;
    }
  
########### FUNCION PARA CREAR MULTICELL SIN SALTO DE LINEA ############

function GetMultiCellHeight($w, $h, $txt, $border=null, $align='J') {
    // Calculate MultiCell with automatic or explicit line breaks height
    // $border is un-used, but I kept it in the parameters to keep the call
    //   to this function consistent with MultiCell()
    $cw = &$this->CurrentFont['cw'];
    if($w==0)
        $w = $this->w-$this->rMargin-$this->x;
    $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
    $s = str_replace("\r",'',$txt);
    $nb = strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $sep = -1;
    $i = 0;
    $j = 0;
    $l = 0;
    $ns = 0;
    $height = 0;
    while($i<$nb)
    {
        // Get next character
        $c = $s[$i];
        if($c=="\n")
        {
            // Explicit line break
            if($this->ws>0)
            {
                $this->ws = 0;
                $this->_out('0 Tw');
            }
            //Increase Height
            $height += $h;
            $i++;
            $sep = -1;
            $j = $i;
            $l = 0;
            $ns = 0;
            continue;
        }
        if($c==' ')
        {
            $sep = $i;
            $ls = $l;
            $ns++;
        }
        $l += $cw[$c];
        if($l>$wmax)
        {
            // Automatic line break
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
                if($this->ws>0)
                {
                    $this->ws = 0;
                    $this->_out('0 Tw');
                }
                //Increase Height
                $height += $h;
            }
            else
            {
                if($align=='J')
                {
                    $this->ws = ($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                    $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                }
                //Increase Height
                $height += $h;
                $i = $sep+1;
            }
            $sep = -1;
            $j = $i;
            $l = 0;
            $ns = 0;
        }
        else
            $i++;
    }
    // Last chunk
    if($this->ws>0)
    {
        $this->ws = 0;
        $this->_out('0 Tw');
    }
    //Increase Height
    $height += $h;

    return $height;
}

function MultiAlignCell($w,$h,$text,$border=0,$ln=0,$align='L',$fill=false)
{
    // Store reset values for (x,y) positions
    $x = $this->GetX() + $w;
    $y = $this->GetY();

    // Make a call to FPDF's MultiCell
    $this->MultiCell($w,$h,$text,$border,$align,$fill);

    // Reset the line position to the right, like in Cell
    if( $ln==0 )
    {
        $this->SetXY($x,$y);
    }
}


function MultiCellText($w, $h, $txt, $border=0, $ln=0, $align='J', $fill=false)
{
    // Custom Tomaz Ahlin
    if($ln == 0) {
        $current_y = $this->GetY();
        $current_x = $this->GetX();
    }

    // Output text with automatic or explicit line breaks
    $cw = &$this->CurrentFont['cw'];
    if($w==0)
        $w = $this->w-$this->rMargin-$this->x;
    $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
    $s = str_replace("\r",'',$txt);
    $nb = strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $b = 0;
    if($border)
    {
        if($border==1)
        {
            $border = 'LTRB';
            $b = 'LRT';
            $b2 = 'LR';
        }
        else
        {
            $b2 = '';
            if(strpos($border,'L')!==false)
                $b2 .= 'L';
            if(strpos($border,'R')!==false)
                $b2 .= 'R';
            $b = (strpos($border,'T')!==false) ? $b2.'T' : $b2;
        }
    }
    $sep = -1;
    $i = 0;
    $j = 0;
    $l = 0;
    $ns = 0;
    $nl = 1;
    while($i<$nb)
    {
        // Get next character
        $c = $s[$i];
        if($c=="\n")
        {
            // Explicit line break
            if($this->ws>0)
            {
                $this->ws = 0;
                $this->_out('0 Tw');
            }
            $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
            $i++;
            $sep = -1;
            $j = $i;
            $l = 0;
            $ns = 0;
            $nl++;
            if($border && $nl==2)
                $b = $b2;
            continue;
        }
        if($c==' ')
        {
            $sep = $i;
            $ls = $l;
            $ns++;
        }
        $l += $cw[$c];
        if($l>$wmax)
        {
            // Automatic line break
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
                if($this->ws>0)
                {
                    $this->ws = 0;
                    $this->_out('0 Tw');
                }
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
            }
            else
            {
                if($align=='J')
                {
                    $this->ws = ($ns>1) ?     ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                    $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                }
                $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                $i = $sep+1;
            }
            $sep = -1;
            $j = $i;
            $l = 0;
            $ns = 0;
            $nl++;
            if($border && $nl==2)
                $b = $b2;
        }
        else
            $i++;
    }
    // Last chunk
    if($this->ws>0)
    {
        $this->ws = 0;
        $this->_out('0 Tw');
    }
    if($border && strpos($border,'B')!==false)
        $b .= 'B';
    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    $this->x = $this->lMargin;

    // Custom Tomaz Ahlin
    if($ln == 0) {
        $this->SetXY($current_x + $w, $current_y);
    }
}


function RoundedRect($x, $y, $w, $h, $r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }


    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)

    {

        //Get string width

        $str_width=$this->GetStringWidth($txt);


        //Calculate ratio to fit cell

        if($w==0)

            $w = $this->w-$this->rMargin-$this->x;

        $ratio = ($w-$this->cMargin*2)/$str_width;


        $fit = ($ratio < 1 || ($ratio > 1 && $force));

        if ($fit)

        {

            if ($scale)

            {

                //Calculate horizontal scaling

                $horiz_scale=$ratio*100.0;

                //Set horizontal scaling

                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));

            }

            else

            {

                //Calculate character spacing in points

                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;

                //Set character spacing

                $this->_out(sprintf('BT %.2F Tc ET',$char_space));

            }

            //Override user alignment (since text will fill up cell)

            $align='';

        }


        //Pass on to Cell method

        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);


        //Reset character spacing/horizontal scaling

        if ($fit)

            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');

    }


    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')

    {

        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);

    }


    //Patch to also work with CJK double-byte text

    function MBGetStringLength($s)

    {

        if($this->CurrentFont['type']=='Type0')

        {

            $len = 0;

            $nbbytes = strlen($s);

            for ($i = 0; $i < $nbbytes; $i++)

            {

                if (ord($s[$i])<128)

                    $len++;

                else

                {

                    $len++;

                    $i++;

                }

            }

            return $len;

        }

        else

            return strlen($s);

    }

####################### FIN DEL CODIGO PARA AJUSTAR TEXTO EN CELDAS #####################   
        
}
