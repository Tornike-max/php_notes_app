<?php

namespace Controllers\Http;

use Models\User;

class SessionController
{
    public function login()
    {
        return view('../view/session/login.view.php');
    }

    public function loginUser()
    {
        $errors = [];

        $data = getData();

        if (strpos($data['email'], '@') === false) {
            $errors['email'] = ['message' => 'Please enter a valid email address.'];

            return view('../view/session/login.view.php', [
                'errors' => $errors
            ]);
        }

        if (strlen($data['password']) < 6) {
            $errors['password'] = ['message' => 'Your password should be at least 6 characters. '];

            return view('../view/session/login.view.php', [
                'errors' => $errors
            ]);
        }

        $user = new User();
        $auth = $user->attempt($data);

        if ($auth === true) {
            $users = $user->query('select * from users');
            return view('../view/users/index.view.php', [
                'users' => $users
            ]);
        } else {
            return view('../view/session/login.view.php');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /session/login');
    }
}
