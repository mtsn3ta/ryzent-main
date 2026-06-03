<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MonthlyLeads extends StatsOverviewWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        $count = Contact::whereMonth(
            'created_at',
            Carbon::now()->month
        )
        ->whereYear(
            'created_at',
            Carbon::now()->year
        )
        ->count();

        return [

            Stat::make(
                'Leads Bulan Ini',
                $count
            )
                ->description(
                    Carbon::now()->translatedFormat('F Y')
                )
                ->color('info'),

        ];
    }
}
