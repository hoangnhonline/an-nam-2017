<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BaoHanh extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bao_hanh';	

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
    protected $fillable = [
                            'order_id', 
                            'serial_no',
                            'ten_sp',
                            'start_date',
                            'end_date',
                            'status'
                            ];
   
}
