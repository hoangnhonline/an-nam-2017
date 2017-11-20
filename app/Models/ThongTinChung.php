<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ThongTinChung extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'thong_tin_chung';	

	 /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 
                            'loai_id', 
                            'thong_so', 
                            'detail', 
                            'price', 
                            'cate_id',
                            'image_url',
                            'created_user', 
                            'updated_user'];
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'thong_tin_chung_id');
    }

}   