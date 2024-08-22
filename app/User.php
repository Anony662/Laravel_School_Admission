<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all permission groups.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getPermissionGroups()
    {
        return DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->get();
    }

    /**
     * Get permissions by group name.
     *
     * @param string $groupName
     * @return \Illuminate\Support\Collection
     */
    public static function getPermissionsByGroupName($groupName)
    {
        return DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $groupName)
            ->get();
    }

    /**
     * Check if a role has all specified permissions.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @param array $permissions
     * @return bool
     */
    public static function roleHasPermissions($role, $permissions)
    {
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                return false; // Exit early if permission is missing
            }
        }
        return true; // All permissions were found
    }
}
