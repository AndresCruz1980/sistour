<?php

namespace App\Actions\Authorization;
 
use App\Models\Dispatch;
use App\Models\FormatoPdf;

 
class ImprimirAuthorization
{
    public function handle(Dispatch $dispatch)//: stringRegistro $registro
    {
        $pdf =  new FormatoPdf('P', 'mm', 'LETTER');//new Pdf('P', 'mm', [80, 550]);
        $pdf->SetTitle('DETALLE');
        $pdf->SetMargins(15, 7, 15);
        $pdf->AddPage();
        $pdf->Image(base_path('public').'/assets/images/logo-img.png', 15, -11, 60);
        $col = [];
        $columns = [];
        //$fecha = explode('-', $dispatch->fecha);
        $col[] = array('text' => '', 'width' => 140, 'height' => 10, 'align' => 'R', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $col[] = array('text' => iconv('UTF-8', 'windows-1252', 'N°'), 'width' => 15, 'height' => 10, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 11, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'B', 'drawfill'=>'D');
        $col[] = array('text' => $dispatch->id, 'width' => 30, 'height' => 10, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 11, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'B', 'drawfill'=>'D');
        $columns[] = $col;
        unset($col);
        $col[] = array('text' => 'Tupiza  ', 'width' => 140, 'height' => 5, 'align' => 'R', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'R', 'drawfill'=>'D');
        $col[] = array('text' => iconv('UTF-8', 'windows-1252', 'DIA'), 'width' => 15, 'height' => 5, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'LRTB', 'drawfill'=>'D');
        $col[] = array('text' => iconv('UTF-8', 'windows-1252', 'MES'), 'width' => 15, 'height' => 5, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'LRTB', 'drawfill'=>'D');
        $col[] = array('text' => iconv('UTF-8', 'windows-1252', 'AÑO'), 'width' => 15, 'height' => 5, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'LRTB', 'drawfill'=>'D');
        $columns[] = $col;
        unset($col);
        $col[] = array('text' => '', 'width' => 140, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'R', 'drawfill'=>'D');
        $col[] = array('text' => now()->format('d'), 'width' => 15, 'height' => 5, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'LRTB', 'drawfill'=>'D');
        $col[] = array('text' => now()->format('m'), 'width' => 15, 'height' => 5, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'LRTB', 'drawfill'=>'D');
        $col[] = array('text' => now()->format('Y'), 'width' => 15, 'height' => 5, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => 'LRTB', 'drawfill'=>'D');
        $columns[] = $col;
        $pdf->WriteTable($columns);
        $pdf->Ln(1);
        $col = [];
        $columns = [];        
        $col[] = array('text' => 'ORDEN SALIDA TOURS', 'width' => 185, 'height' => 8, 'align' => 'C', 'font_name' => 'Arial', 'font_size' => 16, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $columns[] = $col;
        unset($col);        
        $col[] = array('text' => 'Prestatario:', 'width' => 40, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $col[] = array('text' => iconv('UTF-8', 'windows-1252', $dispatch?->vagoneta?->propietario?->nombre.' '.$dispatch?->vagoneta?->propietario?->apellido), 'width' => 145, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $columns[] = $col;
        unset($col);
        $col[] = array('text' => 'Placa:', 'width' => 40, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $col[] = array('text' => iconv('UTF-8', 'windows-1252', $dispatch?->vagoneta?->placa), 'width' => 145, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $columns[] = $col;
        unset($col); 
        /*$col[] = array('text' => 'Circuito:', 'width' => 40, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $col[] = array('text' => iconv('UTF-8', 'windows-1252', ''), 'width' => 145, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $columns[] = $col;
        unset($col); */
        $col[] = array('text' => 'Litros Gasolina:', 'width' => 40, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $col[] = array('text' => $dispatch?->litros_asignado, 'width' => 145, 'height' => 5, 'align' => 'L', 'font_name' => 'Arial', 'font_size' => 9, 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => 0.1, 'linearea' => '', 'drawfill'=>'D');
        $columns[] = $col;
        unset($col);                        
        $pdf->WriteTable($columns);
        // Firma
        $pdf->Ln(10);
        $pdf->Cell(95, 10, iconv('UTF-8', 'windows-1252','Sello Autorización'), 0, 0, 'C');
        $pdf->Cell(95, 10, 'Mitru / Representante Legal', 0, 1, 'C');
        
        return $pdf->Output('RECIBO-' . date('U') . '.pdf', 'S');

        /*return response($pdf->Output('S'), 200)
            ->header('Content-Type', 'application/pdf');*/

        /*$fpdf = $this->initializePDF();

        if (!$registro->persona) {
            return $this->renderNoRecibo($fpdf);
        }
        $this->addLogoIfPresent($fpdf, $registro);        
        $this->addContabilizadoWatermark($fpdf, $registro);
        $this->addHeaderDetails($fpdf, $registro);
        $fpdf->Cell(72,3,'--------------------------------------',0,1,'C');
        $this->addReciboDetails($fpdf, $registro);
        $fpdf->Cell(72,3,'--------------------------------------',0,1,'C');
        $this->addColumnHeaders($fpdf, $registro);
        $this->addSubcategoryRows($fpdf, $registro);
        $fpdf->Cell(72,3,'--------------------------------------',0,1,'C');
        $total = $this->calculateTotal($registro);
        $this->addTotalRow($fpdf, $total);
        $fpdf->Cell(72,3,'--------------------------------------',0,1,'C');
        $this->addFooter($fpdf, $registro, $total);
        $this->addQRCode($fpdf, $registro);

        return $fpdf->Output('RECIBO-' . date('U') . '.pdf', 'S');*/
    }

    /*private function initializePDF(): Pdf
    {
        $fpdf = new Pdf('P', 'mm', [80, 550]);
        $fpdf->SetTitle('RECIBO');
        $fpdf->SetMargins(4, 4, 4);
        $fpdf->AddPage();
        return $fpdf;
    }

    private function renderNoRecibo(Pdf $fpdf): string
    {
        $fpdf->SetFont('Arial', 'B', 30);
        $fpdf->SetTextColor(255, 192, 203);
        $fpdf->RotatedText(15, 100, 'NO TIENE RECIBO', 45);
        return $fpdf->Output('RECIBO-' . date('U') . '.pdf', 'S');
    }

    private function addLogoIfPresent(Pdf $fpdf, Registro $registro): void
    {
        $logo = $registro?->diario?->iglesia?->sucursal?->logo_sucursal ?? null;
        if ($logo) {
            $fpdf->Image(public_path() . $logo, 4, 3.5, 14);
        }
    }

    private function addContabilizadoWatermark(Pdf $fpdf, Registro $registro): void
    {
        if ($registro->estado_id == Estado::FINALIZADO) {
            $fpdf->SetFont('Arial', 'B', 30);
            $fpdf->SetTextColor(255, 192, 203);
            $fpdf->RotatedText(15, 100, 'CONTABILIZADO', 45);
        }
    }

    private function addHeaderDetails(Pdf $fpdf, Registro $registro): void
        {$fpdf->SetXY(18, $fpdf->GetY());
        $this->addRow($fpdf, $registro?->diario?->iglesia?->sucursal?->unidad?->nombre_unidad ?? '',59);
        $fpdf->SetXY(18, $fpdf->GetY());
        $this->addRow($fpdf, $registro?->diario?->iglesia?->sucursal?->nombre_sucursal ?? '',59);
        $fpdf->SetXY(18, $fpdf->GetY());
        $this->addRow($fpdf, $registro?->diario?->iglesia?->sucursal?->direccion_sucursal ?? '',59);        
    }

    private function addFooter(Pdf $fpdf, Registro $registro, float $total): void
    {
        $this->addRow($fpdf, 'Son: ' . numtoletras($total, $registro?->diario?->iglesia?->sucursal?->unidad?->moneda?->nombre_moneda ?? ''));
        $fpdf->Cell(72,3,'--------------------------------------',0,1,'C');
        $this->addRow($fpdf, 'Iglesia: ' . $registro?->diario?->iglesia?->nombre_iglesia ?? '');
        $this->addRow($fpdf, 'Nombre: ' . $registro?->referencia_registro);
        $this->addRow($fpdf, 'Tesorero: ' . $registro?->user?->persona?->nombres . ' ' . $registro?->user?->persona?->primer_apellido . ' ' . $registro?->user?->persona?->segundo_apellido);
    }    

    private function addRow(Pdf $fpdf, string $text, int $width = 72): void
    {
        $columns[] = [
            'text' => iconv('UTF-8', 'windows-1252', $text),
            'width' => $width,
            'height' => 4,
            'align' => 'L',
            'font_name' => 'courier',
            'font_size' => 9,
            'font_style' => '',
            'fillcolor' => '255,255,255',
            'textcolor' => '0,0,0', 
            'drawcolor' => '0,0,0',
            'linewidth' => 0.1, 
            'linearea' => '', 
            'drawfill'=>'D'                      
        ];
        $fpdf->WriteTable([$columns]);
    }

    private function addReciboDetails(Pdf $fpdf, Registro $registro): void
    {
        $fpdf->SetFont('courier', 'B', 12);
        $fpdf->Cell(72, 5, iconv('UTF-8', 'windows-1252', 'RECIBO ELECTRÓNICO'), 0, 1, 'C');
        $fpdf->SetFont('courier', 'B', 10);
        $fpdf->Cell(72, 5, iconv('UTF-8', 'windows-1252', 'Nro. ' . str_pad($registro?->recibo_registro, 4, '0', STR_PAD_LEFT)), 0, 1, 'C');
        $fpdf->Ln(3);
        $fpdf->SetFont('courier', '', 9);
        $fpdf->Cell(72, 4, 'Registrado: ' . date('d/m/Y', strtotime($registro?->fecha_registro)), 0, 1, 'C');
        $fpdf->Cell(72, 4, iconv('UTF-8', 'windows-1252', 'Corresponde: ' . $registro?->diario?->mes?->mes . ' ' . $registro?->diario?->gestion?->gestion), 0, 1, 'C');
        $fpdf->Ln(1);
    }

    private function addColumnHeaders(Pdf $fpdf, Registro $registro): void
    {
        $headers = [
            [
                'text' => iconv('UTF-8', 'windows-1252', 'DESCRIPCION'),
                'width' => 52,
                'height' => 4,
                'align' => 'L',
                'font_name' => 'courier',
                'font_size' => 9,
                'font_style' => 'B',
                'fillcolor' => '255,255,255',
                'textcolor' => '0,0,0',
                'drawcolor' => '0,0,0',
                'linewidth' => 0.1,
                'linearea' => '',
                'drawfill' => 'D'
            ],
            [
                'text' => iconv('UTF-8', 'windows-1252', 'MONTO ' . $registro?->diario?->iglesia?->sucursal?->unidad?->moneda?->simbolo_moneda),
                'width' => 20,
                'height' => 4,
                'align' => 'L',
                'font_name' => 'courier',
                'font_size' => 9,
                'font_style' => 'B',
                'fillcolor' => '255,255,255',
                'textcolor' => '0,0,0',
                'drawcolor' => '0,0,0',
                'linewidth' => 0.1,
                'linearea' => '',
                'drawfill' => 'D'
            ]
        ];
    
        $fpdf->WriteTable([$headers]);
    }

    private function addSubcategoryRows(Pdf $fpdf, Registro $registro): void
    {
        $columns = [];
        $total = 0;
    
        foreach ($registro->registroxitems as $registroxitem) {
            $columns[] = [
                [
                    'text' => iconv('UTF-8', 'windows-1252', $registroxitem?->item?->nombre_item),
                    'width' => 52,
                    'height' => 4,
                    'align' => 'L',
                    'font_name' => 'courier',
                    'font_size' => 9,
                    'font_style' => '',
                    'fillcolor' => '255,255,255',
                    'textcolor' => '0,0,0',
                    'drawcolor' => '0,0,0',
                    'linewidth' => 0.1,
                    'linearea' => '',
                    'drawfill' => 'D'
                ],
                [
                    'text' => number_format($registroxitem?->monto_registro, 2, ',', '.'),
                    'width' => 20,
                    'height' => 4,
                    'align' => 'L',
                    'font_name' => 'courier',
                    'font_size' => 9,
                    'font_style' => '',
                    'fillcolor' => '255,255,255',
                    'textcolor' => '0,0,0',
                    'drawcolor' => '0,0,0',
                    'linewidth' => 0.1,
                    'linearea' => '',
                    'drawfill' => 'D'
                ]
            ];
    
            // Sumamos el monto total
            $total += $registroxitem->monto_registro;
        }
    
        $fpdf->WriteTable($columns);
        //$this->addTotalRow($fpdf, $total); // Agregar fila de total al final
    }

    private function calculateTotal(Registro $registro): float
    {
        return $registro->registroxitems->sum('monto_registro');
    }

    private function addTotalRow(Pdf $fpdf, float $total): void
    {
        $fpdf->SetFont('courier', 'B', 9);
        $fpdf->Cell(52, 4, 'Total', 0, 0, 'L');
        $fpdf->Cell(20, 4, number_format($total, 2, ',', '.'), 0, 1, 'L');
    }

    private function addQRCode(Pdf $fpdf, Registro $registro): void
    {
        $x = $fpdf->GetX();
        $y = $fpdf->GetY();
        $url = url('api/imprimir-recibo/' . $registro?->uuid);
        QrCode::size(100)->format('png')->generate($url, public_path('codigos/'.$registro?->uuid.'.png'));
        $fpdf->Image( public_path('codigos/'.$registro?->uuid.'.png'), 33, $y+3, 15);
        $fpdf->SetXY($x, $y+21);
        $fpdf->SetFont('courier','B',9);
        $fpdf->Cell(72, 4, iconv('UTF-8', 'windows-1252', 'DONACION VOLUNTARIA'), 0, 1, 'C');
        $fpdf->SetFont('courier','',9);
        $fpdf->Cell(72, 4, iconv('UTF-8', 'windows-1252', '“Dios ama al dador alegre” 2 Cor. 9:7'), 0, 1, 'C');        
    }*/
}