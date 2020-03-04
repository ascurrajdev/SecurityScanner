<?php

namespace App\Listeners;

use App\Events\GenerarPDF;
use \PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use App\Sala;
class GenerarPDFNotificacion  implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GenerarPDF  $event
     * @return void
     */
    public function handle(GenerarPDF $event)
    {
        $coleccion = $event->collec;
        $salas = Sala::whereBetween('created_at',$coleccion->all())->get();
        $pdf = PDF::loadView('pdf.reservas', compact('salas'));
        Storage::disk('public')->put('reservasSalaVirtual.pdf', $pdf->output());
    }
}
