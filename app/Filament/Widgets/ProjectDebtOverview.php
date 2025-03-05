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
                ->description('Оплатили')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Загальна вартість проектів', $totalCost)
                ->description('В загальному')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Загальний борг', $totalDebt)
                ->description('Борг')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
        ];
    }
}
