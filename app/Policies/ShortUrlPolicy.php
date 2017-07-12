<?php

namespace App\Policies;

use App\User;
use App\ShortUrl;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShortUrlPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the shortUrl.
     *
     * @param  \App\User  $user
     * @param  \App\ShortUrl  $shortUrl
     * @return mixed
     */
    public function view(User $user, ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Determine whether the user can create shortUrls.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the shortUrl.
     *
     * @param  \App\User  $user
     * @param  \App\ShortUrl  $shortUrl
     * @return mixed
     */
    public function update(User $user, ShortUrl $shortUrl)
    {
        //
    }

    /**
     * Determine whether the user can delete the shortUrl.
     *
     * @param  \App\User  $user
     * @param  \App\ShortUrl  $shortUrl
     * @return mixed
     */
    public function delete(User $user, ShortUrl $shortUrl)
    {
        return $shortUrl->user_id == $user->id;
    }
}
