<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
use File;

class Announce extends Model
{
    use SoftDeletes;
    
    const SAVE_TO = '/uploads/announces';
    const EXTENSIONS = ['jpg', 'png', 'jpeg', 'gif'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'text', 'user_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function setTextAttribute($value)
    {
        $this->attributes['text'] = strip_tags($value, '<p><strong><em><br><ol><ul><li><a>');
    }
    
    public function hasImage()
    {
        return $this->getImageSrc() != '/uploads/announces/no-image.png';
    }
    
    public function saveImage($image)
    {
        $ext = $image->extension();
        $image->move(self::getPathForImage(), $this->id . ".$ext");
    }
    
    public function deleteImage()
    {
        return File::delete(self::getPathForImage() . '/' . $this->id . '.' . $this->getImageExt());
    }
    
    public function getImageExt()
    {
        $path = self::getPathForImage();
        $ext = false;
        foreach(self::EXTENSIONS as $e)
        {
            if(File::exists($path . '/' . $this->id . '.' . $e))
            {
               $ext = $e;
               break;
            }
        }
        return $ext;
    }
    
    public static function getPathForImage()
    {
        return public_path() . self::SAVE_TO;
    }
    
    public function getImageSrc()
    {
        $imageSrc = self::SAVE_TO . '/' . 'no-image.png';
        
        $ext = $this->getImageExt();
        if($ext)
        {
            $imageSrc = $imageSrc = self::SAVE_TO . '/' . $this->id . '.' .$ext;
        }
        return $imageSrc;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
