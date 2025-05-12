<?php

namespace App\Exports;

use App\Models\Classes;
use App\Models\Transaction;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TransactionExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents
{
    protected $startDate;
    protected $endDate;
    protected $student_id;
    protected $class_id;

    public function __construct($startDate = null, $endDate = null, $student_id = null, $class_id = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->student_id = $student_id;
        $this->class_id = $class_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $q = Transaction::query();

        if ($this->startDate && $this->endDate) {
            $q->whereBetween('created_at', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ]);
        }

        if ($this->student_id) {
            $q->where('student_id', $this->student_id);
        }

        if($this->class_id) {
            $class = Classes::with('students')->find($this->class_id);
            $s =  $class->students()->select('users.id')->pluck('id');
            $q->whereIn('student_id', $s);
        }

        $q->with(['student', 'teacher']);

        return $q->orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Tipe Transaksi',
            'Tanggal',
            'Nama Siswa',
            'Pencatat',
            'Jumlah',
        ];
    }

    public function map($transaction): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $transaction->type,
            Carbon::parse($transaction->created_at)->format('d/m/Y H:i'),
            $transaction->student->name ?? '-',
            $transaction->teacher->name ?? '-',
            'Rp ' . number_format($transaction->amount, 0, ',', '.'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => ['rgb' => '4472C4']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER
                ],
            ],
            // Style untuk seluruh data
            'A1:F' . ($this->collection()->count() + 1) => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000']
                    ]
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER
                ],
            ],
            // Style untuk kolom nomor dan jumlah
            'A2:A' . ($this->collection()->count() + 1) => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER
                ],
            ],
            'F2:F' . ($this->collection()->count() + 1) => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_RIGHT
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 20,
            'C' => 20,
            'D' => 30,
            'E' => 25,
            'F' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Set tinggi baris header
                $event->sheet->getRowDimension(1)->setRowHeight(20);

                // Beri warna zebra-striping (selang-seling) untuk baris data
                $highestRow = $event->sheet->getHighestRow();
                for ($row = 2; $row <= $highestRow; $row++) {
                    if ($row % 2 == 0) {
                        $event->sheet->getStyle('A' . $row . ':F' . $row)->applyFromArray([
                            'fill' => [
                                'fillType' => Fill::FILL_SOLID,
                                'color' => ['rgb' => 'EDF2F7']
                            ]
                        ]);
                    }
                }

                // Freeze pane agar header tetap terlihat saat scroll
                $event->sheet->freezePane('A2');

                // Judul di atas tabel
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', 'LAPORAN TRANSAKSI');

                // Membuat judul tabel yang lebih informatif
                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', 'LAPORAN TRANSAKSI');
                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER
                    ],
                ]);
                $event->sheet->getRowDimension(1)->setRowHeight(30);

                // Tambahkan tanggal laporan
                $event->sheet->mergeCells('A2:F2');
                $event->sheet->setCellValue('A2', 'Tanggal Cetak: ' . Carbon::now()->format('d/m/Y H:i'));
                $event->sheet->getStyle('A2')->applyFromArray([
                    'font' => ['italic' => true],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ],
                ]);
            },
        ];
    }
}
