<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //閲覧
    public function view(User $user)
    {
        $user_types = [
            'admin',
            'member',
        ];
        return (in_array($user->role, $user_types));
    }

    //追加
    public function create(User $user)
    {
        $user_types = [
            'admin',
        ];
        return (in_array($user->role, $user_types));
    }

    //変更
    public function update(User $user)
    {
        $user_types = [
            'admin',
        ];
        return (in_array($user->role, $user_types));
    }

    //削除
    public function delete(User $user)
    {
        $user_types = [
            'admin',
        ];
        return (in_array($user->role, $user_types));
    }
}