<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Support\Markdown;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Item Details')
                    ->schema([
                        Group::make()->schema([
                            Section::make('Product Information')->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->maxLength(255)
                                    ->disabled()
                                    ->required()
                                    ->dehydrated()
                                    ->unique(Product::class, 'slug', ignoreRecord: true),

                                MarkdownEditor::make('description')
                                    ->columnSpanFull()
                                    ->fileAttachmentsDirectory('products'),
                            ])->columns(2),

                            Section::make('Images')->schema([
                                FileUpload::make('images')
                                    ->multiple()
                                    ->directory('products')
                                    ->maxFiles(6)
                                    ->reorderable()
                            ])
                        ])->columnSpan(2),

                        Group::make()->schema([
                            Section::make('price')->schema([
                                TextInput::make('price')
                                    ->required()
                                    ->type('number')
                                    ->prefix('TND')
                            ]),

                            Section::make('Associations')->schema([
                                Select::make('category_id')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->relationship('category', 'name'),

                                Select::make('brand_id')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->relationship('brand', 'name'),

                                Select::make('carbrand_id') 
                                    ->label('Marque de voiture')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->relationship('carbrand', 'name') 
                            ]),

                            Section::make('Status')->schema([
                                Toggle::make('in_stock')
                                    ->required()
                                    ->default(true),

                                Toggle::make('is_active')
                                    ->required()
                                    ->default(true),

                                Toggle::make('is_featured')
                                    ->required()
                                    ->default(true),

                                Toggle::make('on_sale')
                                    ->required()
                            ])
                        ])->columnSpan(1),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->sortable(),
                    
                TextColumn::make('brand.name')
                    ->sortable(),

                TextColumn::make('price')
                    ->money('TND')
                    ->sortable(),
                    ImageColumn::make('images')
                    ->label('Image')
                    ->limit(1)
                    ->circular(),
                    
                IconColumn::make('is_featured')
                    ->boolean(),

                IconColumn::make('on_sale')
                    ->boolean(), 

                IconColumn::make('in_stock')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->boolean(),                    

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),

                SelectFilter::make('brand')
                    ->relationship('brand', 'name'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
