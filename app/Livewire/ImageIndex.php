<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;

class ImageIndex extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    #[Rule(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    public function save()
    {
        $this->validate();
        $images = [];
        if (!is_null($this->photos)) {
            foreach ($this->photos as $photo) {
                $name = $photo->hashName();
                $path = $photo->storeAs('images', $name, 'public');
                $images[] = ['name' => $name, 'path' => $path];
            }
        }
        foreach ($images as $image) {
            Image::create($image);
        }

        $this->reset();
        unset($this->images);
    }

    #[Computed(persist: true, key: 'images')]
    public function images()
    {
        return Image::all();
    }

    public function download($id)
    {
        $image = Image::find($id);

        return response()->download(storage_path('app/public/'.$image->path), 'image.png');
    }

    public function render()
    {
        return view('livewire.image-index')->layout('layouts.app');
    }
}
