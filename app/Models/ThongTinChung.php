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
                            'cate_id',
                            'created_user', 
                            'updated_user'];

}