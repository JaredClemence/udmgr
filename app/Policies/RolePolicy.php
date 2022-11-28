<?php

namespace App\Policies;

use App\Models\UD\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UD\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UD\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Role $role)
    {
        //the current user may not be the user identified in the role.
        //to determine if the user has permission, I must establish that
        //   1. The user has an active role in the case.
        //   2. The user is an attorney.
        //
        //Only the attorney can modify a role once it is created.

        $case = $role->case;  //identify the related case. Assume the role is for a different user.
        $caseUsers = $case->users;  //Get all users associated with the case.
        $caseHasUser = $caseUsers->contains($user); //verify that user is one of them.
        if( $caseHasUser ){
          //fetch the role specific for the active user.
           $userRole = Role::where(['user_id'=>$user->id, 'legal_case_id'=>$case->id])->first();
           //verify that it exists and that the user is an attorney.
           if($userRole != null && $userRole->type == Role::ATTORNEY){
             //grant permission to update.
             return true;
           }
        }
        //refuse permission to update in all other cases.
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UD\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UD\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UD\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
