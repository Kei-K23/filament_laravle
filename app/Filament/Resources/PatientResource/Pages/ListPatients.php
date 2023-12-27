<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Patient;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPatients extends ListRecords
{
    protected static string $resource = PatientResource::class;

    public function getTabs(): array
    {


        return [
            'all' => Tab::make('All'),
            'isDog' => Tab::make('Dog')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'dog'))
                ->badge(Patient::query()->where('type', 'dog')->count()),
            'isCat' => Tab::make('Cat')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'cat'))
                ->badge(Patient::query()->where('type', 'cat')->count()),
            'isFish' => Tab::make('Fish')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'fish'))
                ->badge(Patient::query()->where('type', 'fish')->count()),
            'isRabbit' => Tab::make('Rabbit')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'rabbit'))
                ->badge(Patient::query()->where('type', 'rabbit')->count())
        ];
    }

    public function getDefaultActiveTab(): string|int|null
    {
        return 'all';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
