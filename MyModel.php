<?php

namespace App\Core\Contracts;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;
use Storage;

class MyModel extends Eloquent
{
  protected $collection = 'my-table';

  protected $fillable = ['title', 'image'];

  public function setImageAttribute($img){
    $split = explode(',', $img);
    $image = base64_decode($parts[1]);
    $this->attributes['image'] = $this->createFileName($this->getExtension($split[0]));
    Storage::disk('my-images')->put($filename, $image); /* <-- FileSystem */
  }

  private function getExtension($data){
    return explode('/', explode(':', substr($data, 0, strpos($data, ';')))[1])[1];
  }
	
  private function createFileName($extension){
	return Carbon::now()->timestamp . '_' . uniqid() . '.' . $extension;
  }

}