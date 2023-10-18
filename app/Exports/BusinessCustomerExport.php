<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class BusinessCustomerExport implements FromCollection,WithColumnFormatting, WithMapping, WithHeadings, WithColumnWidths
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

    public function map($customer): array
    {
        return [
            $customer->name,
            $customer->custom_email,
            $customer->phone,
            $customer->created_at,
            $customer->email != "" ? "Kayıtlı" : "Kayıt Olmamış",
            $customer->businessAppointments(auth('business')->id())->count(),
            $customer->status == 1 ? "Yasak" : "Aktif",
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
            'Ad',
            'E-Mail',
            'Mobilnummer',
            'Kayıt Zamanı',
            'Kayıtlı mı?',
            'Randevu Sayısı',
            'Durum',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 14,
            'B' => 14,
            'C' => 14,
            'D' => 14,
            'E' => 23,
            'F' => 14,
            'G' => 14,
        ];
    }
}
