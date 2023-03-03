<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Stancl\Tenancy\Contracts\Tenant;

class TenantHelper
{
    /**
     * Get the current tenant ID.
     *
     * @return int|null
     */
    public static function id()
    {
        $tenant = app(Tenant::class);
        return $tenant ? $tenant->id : null;
    }

    /**
     * Get the current tenant name.
     *
     * @return string|null
     */
    public static function name(): ?string
    {
        $tenant = app(Tenant::class);
        return $tenant ? $tenant->name : null;
    }

    /**
     * Get the current tenant domain.
     *
     * @return string|null
     */
    public static function domain(): ?string
    {
        $tenant = app(Tenant::class);
        return $tenant ? $tenant->domains->first()->domain : null;
    }
}
