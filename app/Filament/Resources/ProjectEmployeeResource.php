<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectEmployeeResource\Pages;
use App\Filament\Resources\ProjectEmployeeResource\RelationManagers;
use App\Models\ProjectEmployee;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectEmployeeResource extends Resource
{
    protected static ?string $model = ProjectEmployee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('project_id')
                    ->label('Project')
                    ->relationship('project', 'name')
                    ->required(),
                Forms\Components\Select::make('employee_id')
                    ->label('Employee')
                    ->relationship('employee', 'name')
                    ->required(),
                Forms\Components\TextInput::make('role')
                    ->label('Role')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('hourly_rate')
                    ->label('Hourly Rate')
                    ->numeric(10, 2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.name')
                    ->label('Project')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.name')
                    ->label('Employee')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('hourly_rate')
                    ->label('Hourly Rate'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProjectEmployees::route('/'),
            'create' => Pages\CreateProjectEmployee::route('/create'),
            'edit' => Pages\EditProjectEmployee::route('/{record}/edit'),
        ];
    }
}
