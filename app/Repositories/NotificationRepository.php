<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
class NotificationRepository
{
    public function deleteDuplicate($patient, $fiche)
    {
        DB::table('notifications')
            ->whereNotifiableId($fiche->patient->id)
            ->whereNull('read_at')
            ->where('data->ficheanalyse_id', $fiche->id)
            ->where('data->patient', $patient->id)
            ->delete();
    }
}