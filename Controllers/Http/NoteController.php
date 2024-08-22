<?php

namespace Controllers\Http;

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

    public function show()
    {
        $id = $_GET['id'];
        $model = new Note();

        $note = $model->leftJoin('users', 'notes', $id);


        if (empty($note)) {
            return view('../view/404.php');
        }

        return view('../view/notes/show.note.php', [
            'note' => $note
        ]);
    }

    public function create()
    {
        $model = new Database();
        $users = $model->query('select * from users');

        if (empty($users)) {
            return;
        }

        return view(
            '../view/notes/create.note.php',
            [
                'users' => $users
            ]
        );
    }

    public function store()
    {
        $data = $_POST;
        $notes = new Database();

        $notes->create('notes', [
            'data' => $data
        ]);
        dd($data);
    }

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

        if (strlen($data['body']) < 5) {
            $errors = [
                'body' => [
                    'message' => 'Body needs to be at least 5 characters long'
                ],
            ];
            return view('../View/notes/edit.note.php', [
                'note' => $model->findOrFail('notes', $id),
                'errors' => $errors
            ]);
        }

        $validatedData = [
            'body' => $data['body'],
            'user_id' => $data['user_id']
        ];

        $note = $model->update('notes', $id, $validatedData);

        if (isset($note)) {
            header("Location: /");
        } else {
            return view("../View/notes/edit.note.php", [
                'errors' => ['error' => 'Something went wrong']
            ]);
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $model = new Note();
        $note = $model->findOrFail('notes', $id);
        if (isset($note)) {
            $model->delete('notes', $note['id']);
            header('Location: /');
            exit();
        } else {
            header('Location: /');
            exit();
        }
    }
}
