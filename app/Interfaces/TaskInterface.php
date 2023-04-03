<?php

namespace App\Interfaces;

interface TaskInterface
{
    public function all();
    public function store(Request $request);
    public function show(string $id);
    public function update(Request $request, string $id);
    public function destroy(string $id);
}