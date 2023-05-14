<?php

namespace App\Console;

use App\Models\TransaksiPemesanan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $currentDate = date('d-m-Y');
            $datas = TransaksiPemesanan::where('status_transaksi', 'dipesan')->get();

            foreach ($datas as $data) {
                if ($currentDate > date('d-m-Y', strtotime($data->tanggal_booking))) {
                    $data->update(['status_transaksi' => 'selesai']);
                    $data->hotel_penerbangan->user->update(['saldo_emoney' => $data->hotel_penerbangan->user->saldo_emoney + $data->total_biaya]);
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}