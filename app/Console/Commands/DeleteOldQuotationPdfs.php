<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Quotation;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DeleteOldQuotationPdfs extends Command
{
    protected $signature = 'quotations:cleanup';

    protected $description = 'Delete quotation PDFs older than 7 days';

    public function handle()
    {
        $quotations = Quotation::whereNotNull('pdf_path')
            ->where('pdf_generated_at', '<', Carbon::now()->subDays(7))
            ->get();

        foreach ($quotations as $quotation) {

            if (Storage::disk('public')->exists($quotation->pdf_path)) {

                Storage::disk('public')->delete($quotation->pdf_path);
            }

            $quotation->update([
                'pdf_path' => null,
                'pdf_generated_at' => null,
            ]);
        }

        $this->info('Old quotation PDFs deleted successfully.');
    }
}