<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;


class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $items = Item::count();

        $item_revenue = Item::sum('price_sold');

        $item_orders = Item::sold()->count();

        return [
            Card::make('Revenue this month', '$'.$item_revenue)
                ->description('32k increase')
                ->descriptionIcon('heroicon-s-trending-up')
//                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Card::make('New items', $items)
                ->description('3% decrease')
                ->descriptionIcon('heroicon-s-trending-down')
//                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('danger'),
            Card::make('Total orders', $item_orders)
                ->description('7% increase')
                ->descriptionIcon('heroicon-s-trending-up')
//                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
        ];
    }
}
