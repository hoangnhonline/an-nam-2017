<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ThongTinChung;
use App\Models\LoaiThuocTinh;
use App\Models\ThuocTinh;
use App\Models\Cate;
use App\Models\MetaData;

use Helper, File, Session, Auth, Image;

class ThongTinChungController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $loai_id = isset($request->loai_id) ? $request->loai_id : 8;
        $cate_id = isset($request->cate_id) ? $request->cate_id : null;

        $name = isset($request->name) && $request->name != '' ? $request->name : '';
        
        $query = ThongTinChung::whereRaw('1');

        if( $loai_id > 0){
            $query->where('loai_id', $loai_id);
        }
        if( $cate_id > 0){
            $query->where('cate_id', $cate_id);
        }
        // check editor
        if( Auth::user()->role < 3 ){
            $query->where('created_user', Auth::user()->id);
        }
        if( $name != ''){
            $query->where('name', 'LIKE', '%'.$name.'%');
        }

        $items = $query->orderBy('id', 'desc')->paginate(20);
        
        $loaiSpList = ThongTinChung::where('loai_id', $loai_id)->get();
         if( $loai_id ){
            $cateArr = Cate::where('loai_id', $loai_id)->orderBy('display_order')->get();
        }else{
            $cateArr = (object) [];
        }
        return view('backend.thong-tin-chung.index', compact( 'items', 'loaiSpList' , 'name', 'loai_id', 'cateArr', 'cate_id'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {
        $loai_id = $request->loai_id ? $request->loai_id : 8;     
         
        if( $loai_id ){                       
            
            $loaiThuocTinhArr = LoaiThuocTinh::where('loai_id', $loai_id)->orderBy('display_order')->get();

            if( $loaiThuocTinhArr->count() > 0){
                foreach ($loaiThuocTinhArr as $value) {

                    $thuocTinhArr[$value->id]['id'] = $value->id;
                    $thuocTinhArr[$value->id]['name'] = $value->name;

                    $thuocTinhArr[$value->id]['child'] = ThuocTinh::where('loai_thuoc_tinh_id', $value->id)->select('id', 'name')->orderBy('display_order')->get()->toArray();
                }
                
            }
            
            $cateArr = Cate::where('loai_id', $loai_id)->select('id', 'name')->orderBy('display_order')->get();
            
        }
        return view('backend.thong-tin-chung.create', compact('loai_id', 'thuocTinhArr', 'cateArr'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[            
            'loai_id' => 'required',            
            'name' => 'required'            
        ],
        [            
            'loai_id.required' => 'Bạn chưa chọn danh mục',            
            'name.required' => 'Bạn chưa nhập tên'          
        ]);              
        
        
        $dataArr['created_user'] = Auth::user()->id;

        $dataArr['updated_user'] = Auth::user()->id; 

        if( !empty($dataArr['thuoc_tinh'])){
            foreach( $dataArr['thuoc_tinh'] as $k => $value){
                if( $value == ""){
                    unset( $dataArr['thuoc_tinh'][$k]);
                }
            }
        }

        $dataArr['thong_so'] = json_encode($dataArr['thuoc_tinh']);
        
        $rs = ThongTinChung::create($dataArr);

        $product_id = $rs->id;

        Session::flash('message', 'Tạo mới thành công');

        return redirect()->route('thong-tin-chung.index',['loai_id' => $dataArr['loai_id']]);
    }
    public function storeThuocTinh($id, $dataArr){
        
        SpThuocTinh::where('product_id', $id)->delete();

        if( !empty($dataArr['thuoc_tinh'])){
            foreach( $dataArr['thuoc_tinh'] as $k => $value){
                if( $value == ""){
                    unset( $dataArr['thuoc_tinh'][$k]);
                }
            }
            
            SpThuocTinh::create(['product_id' => $id, 'thuoc_tinh' => json_encode($dataArr['thuoc_tinh'])]);
        }
    }
    public function storeMeta( $id, $meta_id, $dataArr ){
       
        $arrData = [ 'title' => $dataArr['meta_title'], 'description' => $dataArr['meta_description'], 'keywords'=> $dataArr['meta_keywords'], 'custom_text' => $dataArr['custom_text'], 'updated_user' => Auth::user()->id ];
        if( $meta_id == 0){
            $arrData['created_user'] = Auth::user()->id;            
            $rs = MetaData::create( $arrData );
            $meta_id = $rs->id;
            
            $modelSp = ThongTinChung::find( $id );
            $modelSp->meta_id = $meta_id;
            $modelSp->save();
        }else {
            $model = MetaData::find($meta_id);           
            $model->update( $arrData );
        }              
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $thuocTinhArr = [];        
        $detail = ThongTinChung::find($id);
        if( $detail ){
            $spThuocTinhArr = json_decode( $detail->thong_so, true);
        }                       
        $loai_id = $detail->loai_id; 
  
        $loaiThuocTinhArr = LoaiThuocTinh::where('loai_id', $loai_id)->orderBy('display_order')->get();
         
        if( $loaiThuocTinhArr->count() > 0){
            foreach ($loaiThuocTinhArr as $value) {

                $thuocTinhArr[$value->id]['id'] = $value->id;
                $thuocTinhArr[$value->id]['name'] = $value->name;

                $thuocTinhArr[$value->id]['child'] = ThuocTinh::where('loai_thuoc_tinh_id', $value->id)->select('id', 'name')->orderBy('display_order')->get()->toArray();
            }            
        }        

        $cateArr = Cate::where('loai_id', $loai_id)->select('id', 'name')->orderBy('display_order')->get();
        return view('backend.thong-tin-chung.edit', compact('detail', 'thuocTinhArr', 'spThuocTinhArr', 'cateArr'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[            
            'loai_id' => 'required',            
            'name' => 'required'            
        ],
        [            
            'loai_id.required' => 'Bạn chưa chọn danh mục',            
            'name.required' => 'Bạn chưa nhập tên sản phẩm '
        ]);       
        
        if( !empty($dataArr['thuoc_tinh'])){
            foreach( $dataArr['thuoc_tinh'] as $k => $value){
                if( $value == ""){
                    unset( $dataArr['thuoc_tinh'][$k]);
                }
            }
        }
        
        $dataArr['thong_so'] = json_encode($dataArr['thuoc_tinh']);

        $dataArr['updated_user'] = Auth::user()->id;
        
        $model = ThongTinChung::find($dataArr['id']);

        $model->update($dataArr);        
        
        Session::flash('message', 'Cập nhật thành công');        

        return redirect()->route('thong-tin-chung.edit', $dataArr['id']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = ThongTinChung::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa thành công');
        return redirect()->route('thong-tin-chung.index');
    }
}
