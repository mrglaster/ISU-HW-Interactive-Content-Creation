<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFormModel extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function saveAsJson()
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
        ];
        $filename = Str::random(10) . '.json';
        $filePath = 'form-uploaded/' . $filename;
        Storage::disk('public')->put($filePath, json_encode($data));
        return $filename;
    }
}
