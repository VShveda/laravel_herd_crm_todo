<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Console\View\Components\Choice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Full Name')
                    ->required(),
                TextInput::make('position')
                    ->label('Position')
                    ->required(),
                Select::make('salary_type')
                    ->label('Salary Type')
                    ->options([
                        'hourly' => 'hourly',
                        'fixed' => 'fixed',
                    ])
                    ->required(),
                TextInput::make('rate')
                    ->numeric()
                    ->visible(fn ($get) => $get('salary_type') === 'hourly'),
                TextInput::make('fixed_salary')
                    ->numeric()
                    ->visible(fn ($get) => $get('salary_type') === 'fixed'),
                DatePicker::make('hire_date')
                    ->required(),
                Select::make('status')
                    ->options([
                    'active' => 'Активний',
                    'inactive' => 'Неактивний',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('position'),
                SelectColumn::make('status')
                    ->options([
                        'active' => 'Активний',
                        'inactive' => 'Неактивний',
                    ])
                    ->sortable()
                    ->searchable(),
                TextColumn::make('salary_type')->badge(),
                TextColumn::make('rate'),
                TextColumn::make('fixed_salary'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
