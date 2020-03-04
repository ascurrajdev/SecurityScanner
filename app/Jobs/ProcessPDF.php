<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use \PDF;
use Illuminate\Support\Facades\Storage;
use App\Sala;
class ProcessPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $collection;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $collect)
    {
        $this->collection = $collect;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $coleccion = $this->collection;
        $salas = Sala::whereBetween('created_at',$coleccion->all())->get();
        $pdf = PDF::loadView('pdf.reservas', compact('salas'));
        Storage::disk('public')->put('reservasSalaVirtual.pdf', $pdf->output());
    }
}
