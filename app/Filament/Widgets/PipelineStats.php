<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PipelineStats extends StatsOverviewWidget
{
    protected static ?int $sort = 6;

    protected function getStats(): array
    {
        return [

            Stat::make(
                'New',
                Contact::where('status', 'New')->count()
            )
                ->color('gray'),

            Stat::make(
                'Contacted',
                Contact::where('status', 'Contacted')->count()
            )
                ->color('warning'),

            Stat::make(
                'Negotiation',
                Contact::where('status', 'Negotiation')->count()
            )
                ->color('info'),

            Stat::make(
                'Won',
                Contact::where('status', 'Won')->count()
            )
                ->color('success'),

            Stat::make(
                'Lost',
                Contact::where('status', 'Lost')->count()
            )
                ->color('danger'),

        ];
    }
}
