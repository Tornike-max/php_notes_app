<?php

namespace Controllers\Http;

use Models\Database;
use Models\Note;

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

        return view('../view/notes/edit.note.php', [
            'note' => $note,
            'joinedNote' => $joined
        ]);
    }

    public function update()
    {
        $id = $_GET['id'];

        dd($id);
    }

    public function destroy() {}
}
