<?php

namespace App\Services;

use App\Models\Song;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SongInterface;
use Illuminate\Support\Str;
use App\Traits\FileTrait;

class SongService
{
    use FileTrait;
    public function __construct(SongInterface $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data['url'] =  $this->uploadfile($request, 'url'); 
        $this->songRepository->create($data);
    }

    public function update(Request $request, $id)
    {   
        $data = $request->all();
        $data['id'] = Song::find($id);
        $data['url'] =  $this->uploadfile($request, 'url');
        $this->songRepository->update($id, $data);
    }
}