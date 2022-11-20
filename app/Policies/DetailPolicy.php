<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Detail;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny( $user)
    {
        return $this->allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view( $user, Detail $detail)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create( $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Detail $detail)
    {
        // if (auth('admin')->check())
        return $admin->hasPermissionTo('Update-Detail')
            ? $this->allow() : $this->deny();
    // else return $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $user, Detail $detail)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore( $user, Detail $detail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete( $user, Detail $detail)
    {
        //
    }
}
