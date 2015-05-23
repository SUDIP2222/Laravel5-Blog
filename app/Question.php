<?php namespace App;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

   // protected $fillable = ['question'];
    public function User(){
            
      return $this->belongsTo('\App\User');
    
    }
    
    
    public function answers(){
            
            return $this->hasMany('\App\Answer');
    
    }

    public static function your_questions(){
        
        
        return static::where ('user_id','=',Auth::user()->id)->paginate(50);
    }
    public static function unsolved(){
        
        
        return static::where ('solved','=',0)->orderby('id','DESC')->latest()->paginate(50);
    }
    public static function unsolvedbar(){
        
        
        return static::where ('solved','=',0)->orderby('id','DESC')->latest()->take(3)->get();;
    }
}
