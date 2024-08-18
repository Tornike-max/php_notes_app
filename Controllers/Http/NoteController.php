<?php

namespace Controllers\Http;


class NoteController
{
    public function index()
    {
        dd('hello');
        return view('../../view/notes/index.notes.php');
    }

    public function show() {}

    public function create() {}

    public function store() {}

    public function edit() {}

    public function update() {}

    public function destroy() {}
}
