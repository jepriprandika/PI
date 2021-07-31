<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
{
    return [
        'view_users',
        'add_users',
        'edit_users',
        'delete_users',

        'view_roles',
        'add_roles',
        'edit_roles',
        'delete_roles',

        'view_services',
        'add_services',
        'edit_services',
        'delete_services',

        'view_orders',
        'add_orders',
        'edit_orders',
        'delete_orders',

        'view_categories',
        'add_categories',
        'edit_categories',
        'delete_categories',
    ];
}
}
