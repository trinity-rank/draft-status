<?php

namespace Trinityrank\DraftStatus\Traits;

use Illuminate\Support\Facades\Validator;
use Laravel\Nova\Http\Requests\NovaRequest;

trait DraftValidator
{
    // Remove validation if post is saved as draft
    protected static function validateRequest(NovaRequest $request) {
        if($request->preview != null) {
            $request->request->add(['status' => 2]);
            if(!$request->slug) {
                $request->request->add(['slug' => $request->preview]);
            }
        } else {
            if(!$request->slug) {
                $request->request->add(['slug' => time()]);
            }
        }

        $request->request->remove('preview');

        return Validator::make($request->all(), [])
            ->after(function ($validator) use ($request) {
                static::afterValidation($request, $validator);
                static::afterCreationValidation($request, $validator);
            });
    }


    // Remove validation on post create
    public static function validatorForCreation(NovaRequest $request)
    {
        if($request->status == 0) {
            return self::validateRequest($request);
        }
        return parent::validatorForCreation($request);
    }


    // Remove validation on post update
    public static function validatorForUpdate(NovaRequest $request, $resource = null)
    {
        if($request->status == 0) {
            return self::validateRequest($request);
        }
        return parent::validatorForUpdate($request, $resource);
    }


    // Create - Stay on post after "preview" button is clicked
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        if($request->status == 2) {
            return exit();
        }
        return parent::redirectAfterCreate($request, $resource);
    }


    // Update - Stay on post after "preview" button is clicked
    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        if($request->status == 2) {
            return exit();
        }
        return parent::redirectAfterUpdate($request, $resource);
    }


    // Remove "preview"
    public static function indexQuery(NovaRequest $request, $query)
    {
        $query->where('status','!=',2);
        return parent::indexQuery($request, $query);
    }

}
