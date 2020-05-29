<?php

namespace App\Policies;

use App\Animal;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Animal $animal)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Animal $animal)
    {
        return $user->id === $animal->user->id;
    }

    public function delete(User $user, Animal $animal)
    {
        return $user->id === $animal->user->id;
    }
}
