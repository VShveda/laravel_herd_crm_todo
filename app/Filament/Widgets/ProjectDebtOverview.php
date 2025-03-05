<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Project;
use App\Models\ProjectPayment;

class ProjectDebtOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPayments = ProjectPayment::query()->sum('amount');
        $totalCost = Project::query()->sum('cost');
        $totalDebt = $totalCost - $totalPayments;

        return [
            Stat::make('Загальна сума оплат', $totalPayments)
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Загальна вартість проектів', $totalCost)
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Загальний борг', $totalDebt)
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
