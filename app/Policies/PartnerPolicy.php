<?php

namespace App\Policies;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
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
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view( $user, Partner $partner)
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
        if (auth('admin')->check())
        return $user->hasPermissionTo('Create-Partner')
            ? $this->allow() : $this->deny();
    else return $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $user, Partner $partner)
    {
        if (auth('admin')->check())
        return $user->hasPermissionTo('Update-Partner')
            ? $this->allow() : $this->deny();
    else return $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $user, Partner $partner)
    {
        if (auth('admin')->check())
        return $user->hasPermissionTo('Delete-Partner')
            ? $this->allow() : $this->deny();
    else return $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore( $user, Partner $partner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete( $user, Partner $partner)
    {
        //
    }
}
