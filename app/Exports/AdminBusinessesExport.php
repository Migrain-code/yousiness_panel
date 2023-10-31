<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class AdminBusinessesExport implements FromCollection,WithColumnFormatting, WithMapping, WithHeadings, WithColumnWidths
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }

    public function map($business): array
    {
        return [
           $business->name,
           $business->owner,
           $business->email,
           $business->business_email,
           $business->offDays?->name,
           $business->start_time,
           $business->end_time,
           $business->approve_type == 1 ? "Otomatik Onay" : "Manuel Onay",
           $business->cities->name,
           $business->cities->post_code,
           $business->cities->country->name,
           $business->address,
           $business->created_at?->format('d.m.Y H:i:s')
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function headings(): array
    {
        return [
            'Salonname',
            'İşletme Sahibi',
            'Mobilnummer',
            'E-Mail',
            'Freier Tag',
            'Mesai Başlangıç Saati',
            'Mesai Bitiş Saati',
            'Onay Türü',
            'Şehir',
            'Posta Kodu',
            'Ülke',
            'Adres',
            'Kayıt Tarihi'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 14,
            'B' => 14,
            'C' => 14,
            'D' => 14,
            'E' => 14,
            'F' => 14,
            'G' => 14,
            'H' => 14,
            'I' => 14,
            'j' => 23,
            'K' => 14,
            'L' => 14,
            'M' => 14,
        ];
    }
}
