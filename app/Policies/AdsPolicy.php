<?php

namespace App\Policies;

use App\User;
use App\Ads;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ads.
     *
     * @param  \App\User  $user
     * @param  \App\Ads  $ads
     * @return mixed
     */
    public function view(User $user, Ads $ads)
    {
        return true;
    }

    /**
     * Determine whether the user can create ads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the ads.
     *
     * @param  \App\User  $user
     * @param  \App\Ads  $ads
     * @return mixed
     */
    public function update(User $user, Ads $ads)
    {
        return $user->id === $ads->user_id;
    }

    /**
     * Determine whether the user can delete the ads.
     *
     * @param  \App\User  $user
     * @param  \App\Ads  $ads
     * @return mixed
     */
    public function delete(User $user, Ads $ads)
    {
        return $user->id === $ads->user_id;
    }
}
