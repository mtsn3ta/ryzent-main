<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ConversionStats extends StatsOverviewWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        $total = Contact::count();

        $won = Contact::where('status', 'Won')->count();

        $rate = $total > 0
            ? round(($won / $total) * 100, 1)
            : 0;

        return [

            Stat::make(
                'Conversion Rate',
                $rate . '%'
            )
                ->description(
                    "{$won} Won dari {$total} Leads"
                )
                ->color('success'),

        ];
    }
}
