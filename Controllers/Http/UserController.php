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

    public function shpw() {}

    public function create() {}

    public function store() {}

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
