<?php

namespace Trinityrank\DraftStatus\Fields;

use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Panel;
use Trinityrank\DraftStatus\DraftStatus;
use Trinityrank\DraftStatus\PreviewButton;

class DraftComponents
{

    // Form fields
    public static function fields()
    {
        return [
            DraftStatus::make('Status')->hideFromIndex(),
            
            // TODO: Preview id not done yet
            // PreviewButton::make('Preview'),

            Select::make('Status','status')
                ->default(1)
                ->options([
                    '0' => 'Draft',
                    '1' => 'Publish',
                ])->onlyOnForms(),
        ];
    }

    public static function make()
    {
        return new Panel('', self::Fields());
    }


    // Index fields
    public static function indexFields()
    {
        return [
            DraftStatus::make('Status')->onlyOnIndex(),
            // Badge::make('Status')->map([
            //     '0' => 'info',
            //     '1' => 'success',
            // ]),
        ];
    }

    public static function index()
    {
        // dd(request()->all());
        return new Panel('', self::indexFields());
    }

}
