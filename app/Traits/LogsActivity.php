<?php

namespace App\Traits;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait LogsActivity
{
    /**
     * Boot the trait for a model.
     */
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            static::logActivity('create', $model);
        });

        static::updated(function ($model) {
            static::logActivity('update', $model);
        });

        static::deleted(function ($model) {
            static::logActivity('delete', $model);
        });
    }

    /**
     * Log activity for the model.
     *
     * @param string $action
     * @param mixed $model
     * @return void
     */
    protected static function logActivity($action, $model)
    {
        $oldData = [];
        $newData = [];

        if ($action === 'create') {
            $newData = $model->getAttributes();
        } elseif ($action === 'update') {
            $oldData = collect($model->getOriginal())->intersectByKeys($model->getDirty())->toArray();
            $newData = $model->getDirty();
        } elseif ($action === 'delete') {
            $oldData = $model->getAttributes();
        }

        Log::create([
            'model' => get_class($model),
            'model_id' => $model->getKey(),
            'action' => $action,
            'user_id' => Auth::check() ? Auth::id() : null,
            'old_data' => json_encode($oldData),
            'new_data' => json_encode($newData),
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }
}
