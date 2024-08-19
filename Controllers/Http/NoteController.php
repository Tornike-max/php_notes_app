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

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
