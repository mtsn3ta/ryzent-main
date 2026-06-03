<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Portfolio', Portfolio::count())
                ->description('Project Portfolio')
                ->color('info'),

            Stat::make('Articles', Post::count())
                ->description('Blog Articles')
                ->color('success'),

            Stat::make('Services', Service::count())
                ->description('Available Services')
                ->color('warning'),

            Stat::make('Total Leads', Contact::count())
    ->description('All Contacts')
    ->color('primary'),

Stat::make(
    'Unread Leads',
    Contact::where('is_read', false)->count()
)
    ->description('Waiting Response')
    ->color('danger'),

Stat::make(
    'New Leads',
    Contact::where('status', 'New')->count()
)
    ->color('info'),

Stat::make(
    'Won Leads',
    Contact::where('status', 'Won')->count()
)
    ->color('success'),

Stat::make(
    'Lost Leads',
    Contact::where('status', 'Lost')->count()
)
    ->color('danger'),

        ];
    }
}
