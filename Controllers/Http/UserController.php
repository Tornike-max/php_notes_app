<?php


namespace Controllers\Http;

use Models\User;

class UserController
{
    public function index()
    {
        $model = new User();
        $users = $model->query('select * from users');

        return view('../view/users/index.view.php', [
            'users' => $users
        ]);
    }

    public function show()
    {
        $id = $_GET['id'];

        $model = new User();
        $user = $model->findOrFail('users', $id);


        return view('../view/users/show.view.php', [
            'user' => $user
        ]);
    }

    public function create()
    {

        return view('../view/users/create.view.php');
    }

    public function store()
    {
        $data = getData();

        if (!isset($data['email'])) {
            $errors['email'] = ['message' => 'Email is required'];
            return view('../view/users/create.view.php', [
                'errors' => $errors
            ]);
        }
        if (strpos($data['email'], '@') === false) {
            $errors['email'] = ['message' => 'Email is not valid'];
            return view('../view/users/create.view.php', [
                'errors' => $errors
            ]);
        }
        if (!isset($data['name'])) {
            $errors['name'] = ['message' => 'Name is required'];
            return view('../view/users/create.view.php', [
                'errors' => $errors
            ]);
        }
        if (isset($data['name']) && strlen($data['name']) <= 2) {
            $errors['name'] = ['message' => 'Name should be at least 2 characters long'];
            return view('../view/users/create.view.php', [
                'errors' => $errors
            ]);
        }

        if (!isset($data['password'])) {
            $errors['password'] = ['message' => 'Password is required'];
            return view('../view/users/create.view.php', [
                'errors' => $errors
            ]);
        }

        if (isset($data['password']) && strlen($data['password']) < 6) {
            $errors['password'] = ['message' => 'Password should be at least 6 characters long'];
            return view('../view/users/create.view.php', [
                'errors' => $errors
            ]);
        }

        if ($data['password'] !== $data['password_confirmation']) {
            $errors['password'] = ['message' => 'Passwords should match'];
            return view('../view/users/create.view.php', [
                'errors' => $errors
            ]);
        }

        $model = new User();
        $validatedData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ];
        $user = $model->create('users', $validatedData);

        if ($user) {
            return view('../views/users/index.view.php');
        } else {
            return view('../view/users/create.view.php');
        }
    }

    public function edit() {}

    public function update() {}

    public function delete()
    {
        $id = $_GET['id'];

        $model = new User();
        $model->delete('users', $id);
        header('Location: /users');
        exit();
    }
}
