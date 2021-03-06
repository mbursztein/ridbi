<?php 

namespace ridbi\Repositories;

use ridbi\User;

class UserRepository {

    /**
     * @param $userData
     * @return static
     */
    public function findByUsernameOrCreate($userData)
    {
        return User::firstOrCreate([
            'username' => $userData->nickname,
            'email'    => $userData->email,
            'name'   => $userData->name,
            'avatar'   => $userData->avatar,
        ]);
    }
} 
