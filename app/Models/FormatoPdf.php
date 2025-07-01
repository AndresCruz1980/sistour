<?php

namespace App\Models;

use App\Models\Pdf;

class FormatoPdf extends Pdf
{
    private $marcaAgua = '';
    private $showHeader = false;
    private $showFooter = false;
    private $logo = '';
    private $resolucion = '';
    private $piePagina = '';
    private $showEmitido = false;
    private $portrait = true;

        
    public function SetLogo($val){
        $this->logo = $val;
    }

    public function SetResolucion($val){
        $this->resolucion = $val;
    }
    
    public function SetPiePagina($val){
        $this->piePagina = $val;
    } 
    
    public function SetShowEmitido($val){
        $this->showEmitido = $val;
    }

    public function SetPortrait($val){
        $this->portrait = $val;
    }     

    public function Header()
    {
       /* if($this->logo){
            $this->Image(public_path().$this->logo,4,3.5,21);
        }
        // Guardar la posición actual
        $x = $this->GetX();
        $y = $this->GetY();
        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(65,105,225);        
        if($this->portrait){
            $this->SetXY(15, 10);
            $this->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Adventistas del Séptimo Día Movimiento de Reforma'), 0, 1, 'C', 0);
            $this->SetFont('Arial', '', 10);
            $this->Cell(0, 8, iconv('UTF-8', 'windows-1252', $this->resolucion), 0, 1, 'C', 0);
            $this->SetDrawColor(65,105,225);
            $this->Line(0, $this->GetY()+0.1, 216, $this->GetY());//28
            /*$this->SetDrawColor(169, 169, 169);
            $this->SetFillColor(65,105,225);
            $this->Rect(0, $this->GetY(), 28.5, 237.5, 'F');*/
        /*}else{
            $this->SetXY(15, 10);
            $this->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Adventistas del Séptimo Día Movimiento de Reforma'), 0, 1, 'C', 0);
            $this->SetFont('Arial', '', 10);
            $this->Cell(0, 8, iconv('UTF-8', 'windows-1252', $this->resolucion), 0, 1, 'C', 0);
            $this->SetDrawColor(65,105,225);
            $this->Line(0, $this->GetY(), 355, $this->GetY());            
        }
        // Restaurar la posición original
        $this->SetXY($x, $y);
        $this->SetFont('Arial','B',50);
        $this->SetTextColor(255,192,203);
        if($this->marcaAgua){
            $this->RotatedText(70,190,$this->marcaAgua,45);
        }*/
    }

    public function Footer()
    {
        // Guardar la posición actual
       /* $x = $this->GetX();
        $y = $this->GetY();        
        $this->SetFont('Arial', 'I', 9);
        $this->SetTextColor(65,105,225);
        if($this->portrait){
            if($this->showEmitido){
                $this->SetXY(10, -25);  
                $this->Cell(195, 7, iconv('UTF-8', 'windows-1252', 'Emitido: '.fechaLiteral(now()->format('Y-m-d'))), 0, 0, 'R', 0); 
            }
            $this->SetXY(15, -18);
            $this->SetDrawColor(65,105,225);
            $this->Line(0, $this->GetY(), 216, $this->GetY());//28
            $this->Cell(0, 8, iconv('UTF-8', 'windows-1252', $this->piePagina), 0, 0, 'C', 0);
            $this->SetXY(195, -13);
            $this->Cell(0, 10, 'Pag. ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }else{
            if($this->showEmitido){
                $this->SetXY(10, -25);  
                $this->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'Emitido: '.fechaLiteral(now()->format('Y-m-d'))), 0, 0, 'R', 0); 
            }            
            $this->SetXY(15, -18);
            $this->SetDrawColor(65,105,225);
            $this->Line(0, $this->GetY(), 355, $this->GetY());
            $this->Cell(0, 8, iconv('UTF-8', 'windows-1252', $this->piePagina), 0, 0, 'C', 0);
            $this->SetXY(300, -13);
            $this->Cell(0, 10, 'Pag. ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
        $this->SetXY($x, $y);*/
    }

    public function SetMarcaAgua($texto){
        $this->marcaAgua = $texto;
    }

    public function SetShowHeader($valor){
        $this->showHeader = $valor;
    }

    public function SetShowFooter($valor){
        $this->showFooter = $valor;
    }    
    
       
        
}
