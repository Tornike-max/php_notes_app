<?php

namespace Controllers\Http;

use Core\Validation;
use Models\Database;
use Models\Note;
use Models\User;

class NoteController
{
    public function index()
    {
        $note = new Note();
        $result = $note->query("SELECT * FROM notes");

        return view('../view/notes/index.notes.php', [
            'data' => $result
        ]);
    }

    public function show() {}

    public function create() {}

    public function store() {}

    public function edit()
    {
        $model = new Note();
        $id = $_GET['id'];

        $note = $model->find('notes', $id);

        $joined = $model->leftJoin('users', 'notes', $note['id']);

        $users = $model->query('select * from users');

        return view('../view/notes/edit.note.php', [
            'note' => $note,
            'joinedNote' => $joined,
            'users' => $users
        ]);
    }

    public function update()
    {
        $id = $_GET['id'];
        $errors = [];


        $model = new Note();
        $data = getData();

        $validation = new Validation();
        $validation->validation($data['body'], [
            'size' => 5,
        ]);

        if ($validation) {
            return view('../../View/notes/edit.note.php', [
                'errors' => $errors
            ]);
        }
        $note = $model->update('notes', $id, $data);
        if (isset($note)) {
            header('Location: /edit');
        } else {
        }
    }

    public function destroy() {}
}
