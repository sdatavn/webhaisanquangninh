<?php

namespace App\Http\Controllers;
session_start();
use Storage;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;
class adminController extends Controller
{
    public function __construct()//bắt buộc login mới vào đc
    {
        $this->middleware('auth');
         $_SESSION['fileok'] =1;//khởi tạo 1 seesion để vào thư mục upload hình ảnh
     }
     public function doimatkhau(){
        return view('admin/doimatkhau');
    }
    public function doimatkhau1(Request $request){
        $taikhoan = \App\User::first();
        if (Hash::check($request->mkcu, Auth::user()->password)){
            if($request->mkmoi == $request->rmkmoi)
            {
                $taikhoan->password = bcrypt($request->mkmoi);
                $taikhoan->save();
                return redirect('admin/doimatkhau')->withSuccessMessage('Đổi Mật Khẩu Thành Công');
            }else
            {
                return redirect('admin/doimatkhau')->withSuccessMessage('Mật Khẩu Nhập Lại Không ');
            }
        }else
        {
            return redirect('admin/doimatkhau')->withSuccessMessage('Mật Khẩu Củ Không Đúng');
        }
    }
    public function menuu(Request $request){
        $menu = \App\menu::all();
        $id = $request->id;
        $tt = $request->tt;
        $thutu = $menu->find($id);
        $thutu->tt = $tt;
        $thutu->save();
    }
    public function menucontt(Request $request){
        echo $menu = \App\theloai::all();
        $id = $request->id;
        $tt = $request->tt;
        $thutu = $menu->find($id);
        $thutu->tt = $tt;
        $thutu->save();
    }
    public function baihaisansx(Request $request){
        $menu = \App\haisan::all();
        $id = $request->id;
        $tt = $request->tt;
        $thutu = $menu->find($id);
        $thutu->tt = $tt;
        $thutu->save();
    }
    public function index(){
    	return view('admin/quanlydonhang');
    }
    public function baihaisan(){
    	$noidung = \App\haisan::orderBy("id","DESC")->paginate(9);
    	$menu = \App\menu::all();
    	return view('admin/baihaisan',['noidung'=>$noidung,'menu'=>$menu]);
    }
    public function upbai(){
    	$theloai=\App\menu::offset(2)->limit(10)->get();
        return view('admin/upbai',['menu'=>$theloai]);
    }
    public function save(Request $request){
    	$haisan = new \App\haisan();
    	$haisan->id_menu = $request->menu;
    	$haisan->title=$request->title;
        $haisan->gia=$request->gia;
        $haisan->url=str_slug($request->title);
        $haisan->noidung=$request->editor1;
        $haisan->id_theloai = $request->theloai;
        $haisan->save();
        if(Input::file('daidien1'))
        {
            $xxx = Input::file('daidien1');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(280, 280)->save(base_path() . "/public/responsive_filemanager/thumbs/baiviet/".$haisan->id.".jpg");
        }
        $files = $request->file('file');
        if(!empty($files)):
            $a=1;
        if($a<4){
            foreach($files as $file):
            $imgbv = new \App\imgbaiviet();
            $imgbv->id_haisan = $haisan->id;
            $imgbv->name =$haisan->id.$a;
            $imgbv->save();
            \Intervention\Image\Facades\Image::make($file->getRealPath())->fit(280, 280)->save(base_path() . "/public/responsive_filemanager/thumbs/baiviet/".$haisan->id ."".$a.".jpg");
            $a=$a+1;
            endforeach;
        }
        endif;
        return redirect("admin/baihaisan")->withSuccessMessage('Đăng Thành Công');;
    }
    public function sua($id)
    {
    	$haisan = \App\haisan::all();
    	$theloai=\App\menu::all();
    	$suahaisan = $haisan->where('id','=', $id);
        $theloai1 = \App\theloai::all();
        foreach($suahaisan as $hs){
            foreach($theloai1 as $tl){
                if($hs->id_theloai==$tl->id)
                {
                    $hs1=$hs->id_menu;
                    $idd=$tl->id;
                    $namee=$tl->name;
                }
            }
        }
        $img = \App\imgbaiviet::where("id_haisan","=",$id)->get();
        $theloai1 = \App\theloai::where("id","<>",$idd)->where("id_menu","=",$hs1)->get();
        return view("admin/suabai",['img'=>$img,'idd'=>$idd,'namee'=>$namee,'theloai1'=>$theloai1,'noidung'=>$suahaisan,'theloai'=>$theloai])->withSuccessMessage('Sữa Bài Thành Công');
    }
    public function suabai(Request $request){
    	$haisan = new \App\haisan();
    	$suahaisan=$haisan::where('id', $request->id)->first();
    	$suahaisan->id_menu=$request->menu;
        $suahaisan->id_theloai=$request->theloai;
        $suahaisan->title=$request->title;
        $suahaisan->gia=$request->gia;
        $suahaisan->noidung=$request->editor1;
        $suahaisan->save();
        if(Input::file('daidien1'))
        {
            $xxx = Input::file('daidien1');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(280, 280)->save(base_path() . "/public/responsive_filemanager/thumbs/baiviet/".$suahaisan->id.".jpg");
        }
        $files = $request->file('file');
        if(!empty($files)):
            $a=1;
        if($a<4){
            foreach($files as $file):
            $imgbv = new \App\imgbaiviet();
            $imgbv->id_haisan = $suahaisan->id;
            $imgbv->name =$suahaisan->id.$a;
            $imgbv->save();
                \Intervention\Image\Facades\Image::make($file->getRealPath())->fit(280, 280)->save(base_path() . "/public/responsive_filemanager/thumbs/baiviet/".$suahaisan->id."".$a.".jpg");
            $a=$a+1;
            endforeach;
        }
        endif;
        return redirect("admin/baihaisan")->withSuccessMessage('Sữa Bài Thành Công');
    }
    public function xoa($id){
    	$haisan = \App\haisan::all();
        $xoabaidang = $haisan->find($id)->delete();
        return redirect("admin/baihaisan");
    }
    public function thongtin(){
        $lienhe = \App\lienhe::all();
        return view('admin/thongtinweb',['lienhe'=>$lienhe]);
    }
    public function gioithieu(){
        $gioithieu = \App\gioithieulienhe::all();
        return view('admin/gioithieu',['gioithieu'=>$gioithieu]);
    }
    public function menu(){
        $menu = \App\menu::offset(2)->limit(10)->orderBy('tt','ASC')->get();
        return view('admin/menu',['menu'=>$menu]);
    }
    public function xoamenu($id){
        $menu = \App\menu::all();
        $xoamenu = $menu->find($id)->delete();
        return redirect('admin/menu');
    }
    public function themmenu(){
        return view('admin/themmenu');
    }
    public function themtl(){
        return view('admin/themtheloai');
    }
    public function savetl($id,Request $request){
        $theloai = new \App\theloai();
        $theloai->id_menu = $id;
        $theloai->name=$request->name;
        $theloai->url=str_slug($request->url);
        $theloai->save();
        return redirect('admin/menu/chitietmenu/'.$id.'');
    }
    public function xoatl($id1,$id){
        $theloai = \App\theloai::all();
        $xoatheloai = $theloai->find($id)->delete();
        return redirect('admin/menu/chitietmenu/'.$id1.'');
    }
    public function suatl($id1,$id){
        $theloai=\App\theloai::where("id","=",$id)->get();
        return view('admin/suatheloai',['thongtin'=>$theloai]);
    }
    public function luutl($id1,$id,Request $request){
        $theloai = new \App\theloai();
        $luutheloai = $theloai->find($id);
        $luutheloai->name=$request->name;
        $luutheloai->url=str_slug($request->url);
        $luutheloai->save();
        return redirect('admin/menu/chitietmenu/'.$id1.'');
    }
    public function luumenu(Request $request){
        $menu = new \App\menu();
        $menu->name=$request->name;
        $menu->url = str_slug($request->url);
        $menu->save();
        if(Input::file('banner'))
        {
            $xxx = Input::file('banner');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(1000, 100)->save(base_path() . "/public/responsive_filemanager/thumbs/quangcao/".$menu->id.".jpg");
        }
        return redirect('admin/menu')->withSuccessMessage('Thêm Menu Thành Công');
    }
    public function suamenu1($id){
        $menu = \App\menu::where("id","=",$id)->get();
        return view('admin/suamenu',['thongtin'=>$menu]);
    }
    public function suamenu2($id,Request $request){
        $menu = \App\menu::all();
        $suamenu = $menu->find($id);
        $suamenu->name=$request->name;
        $suamenu->url=str_slug($request->url);
        $suamenu->save();
        if(Input::file('banner'))
        {
            $xxx = Input::file('banner');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(1000, 100)->save(base_path() . "/public/responsive_filemanager/thumbs/quangcao/".$suamenu->id.".jpg");
        }
        return redirect('admin/menu')->withSuccessMessage('Sữa Menu Thành Công');
    }
    public function menucon($id){
        $theloai = \App\theloai::where("id_menu","=",$id)->get();
        $menu = \App\menu::where("id","=",$id)->get();
        return view('admin/chitiettheloai',['thongtin'=>$theloai,'name'=>$menu]);
    }
    public function luugioithieu(Request $request){
        $thongtin = new \App\gioithieulienhe();
        $suathongtin=$thongtin::where('id','1')->first();
        $suathongtin->gioithieu=$request->editor1;
        $suathongtin->save();
        return redirect('admin/gioithieu');
    }
    public function luulienhe(Request $request){
        $thongtin = new \App\gioithieulienhe();
        $suathongtin=$thongtin::where('id','1')->first();
        $suathongtin->lienhe=$request->editor1;
        $suathongtin->save();
        return redirect('admin/lienhe');
    }
    public function lienhe(){
        $lienhe = \App\gioithieulienhe::all();
        return view('admin/lienhe',['lienhe'=>$lienhe]);
    }
    public function quanlybanner(){
        return view('admin/quanlybanner');
    }
    public function quanlyslide(){
        $image = \App\urlslide::all();
        return view('admin/quanlyslide',['image'=>$image]);
    }
    public function quanlydonhang(){
        $donhang = \App\donhang::paginate(10);;
        return view('admin/quanlydonhang',['donhang'=>$donhang]);
    }
    public function suabaii(Request $request){
        \App\imgbaiviet::where("name","=",$request->kt)->delete();
    }
    public function quanlydonhangg(Request $request){
        $kiemtra = \App\donhang::find($request->kt);
        $kiemtra->kt = 1;
        $kiemtra->save();
    }
    public function banner(){//cập nhật banner
        if(Input::file('banner1'))
        {
            $xxx = Input::file('banner1');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(291, 116)->save(base_path() . "/public/responsive_filemanager/thumbs/banner/1.jpg");
        }
        if(Input::file('banner2'))
        {
            $xxx = Input::file('banner2');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(291, 116)->save(base_path() ."/public/responsive_filemanager/thumbs/banner/2.jpg");
        }
        if(Input::file('banner3'))
        {
            $xxx = Input::file('banner3');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(291, 116)->save(base_path() ."/public/responsive_filemanager/thumbs/banner/3.jpg");
        }
        if(Input::file('banner4'))
        {
            $xxx = Input::file('banner4');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(1000, 100)->save(base_path() ."/public/responsive_filemanager/thumbs/banner/4.jpg");
        }
        return redirect("admin/quanlybanner");
    }
    public function uphinhslide(){
        return view('admin/themslider');
    }
    public function uphinhslide1(Request $request){
        $hinhanh = new \App\urlslide();
        $hinhanh->url = $request->url;
        $hinhanh->save();
        if(Input::file('slide'))
        {
            $xxx = Input::file('slide');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(693, 370)->save(base_path() ."/public/responsive_filemanager/thumbs/slide/".$hinhanh->id.".jpg");
        }
        $image = \App\urlslide::all();
        return view('admin/quanlyslide',['image'=>$image]);
    }
    public function suahinhslide($id){
        $hinhanh = \App\urlslide::find($id)->first();
        return view('admin/suaslider',['id'=>$id,'url'=>$hinhanh->url]);
    }
    public function suahinhslide1($id , Request $request){
        $hinhanh = \App\urlslide::find($id);
        $hinhanh->url = $request->url;
        $hinhanh->save();
        return back();
    }
    public function xoahinhslide($id){
        \App\urlslide::find($id)->delete();
        return Back();
    }
    public function slide(Request $request){//cập nhật banner
        if(Input::file('slide1'))
        {
            $xxx = Input::file('slide1');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(693, 370)->save(base_path() . "/public/responsive_filemanager/thumbs/slide/1.jpg");
        }
        if(Input::file('slide2'))
        {
            $xxx = Input::file('slide2');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(693, 370)->save(base_path() ."/public/responsive_filemanager/thumbs/slide/2.jpg");
        }
        if(Input::file('slide3'))
        {
            $xxx = Input::file('slide3');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(693, 370)->save(base_path() ."/public/responsive_filemanager/thumbs/slide/3.jpg");
        }
        if(Input::file('slide4'))
        {
            $xxx = Input::file('slide4');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(693, 370)->save(base_path() ."/public/responsive_filemanager/thumbs/slide/4.jpg");
        }
        if(Input::file('slide5'))
        {
            $xxx = Input::file('slide5');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(693, 370)->save(base_path() ."/public/responsive_filemanager/thumbs/slide/5.jpg");
        }
        if(Input::file('slide6'))
        {
            $xxx = Input::file('slide6');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(693, 370)->save(base_path() ."/public/responsive_filemanager/thumbs/slide/6.jpg");
        }
        \App\urlslide::where("id","=",$request->id1)->update(['url'=>$request->url1]);
        \App\urlslide::where("id","=",$request->id2)->update(['url'=>$request->url2]);
        \App\urlslide::where("id","=",$request->id3)->update(['url'=>$request->url3]);
        \App\urlslide::where("id","=",$request->id4)->update(['url'=>$request->url4]);
        \App\urlslide::where("id","=",$request->id5)->update(['url'=>$request->url5]);
        \App\urlslide::where("id","=",$request->id6)->update(['url'=>$request->url6]);
        return redirect("admin/quanlyslide");
    }
    public function capnhatthongtin(Request $request){
        $thongtin = new \App\lienhe();
        $suathongtin=$thongtin->first();
        $suathongtin->tentrangweb=$request->tenwebsite;
        $suathongtin->zalo = $request->sdt;
        $suathongtin->diachi = $request->diachi;
        $suathongtin->fanpage = $request->facebook;
        $suathongtin->google = $request->gmail;
        $suathongtin->youtube = $request->youtube;
        $suathongtin->save();
        if(Input::file('logo'))
        {
            $xxx = Input::file('logo');
            \Intervention\Image\Facades\Image::make($xxx->getRealPath())->fit(360, 90)->save(base_path() ."/public/responsive_filemanager/thumbs/logo.png");
        }
        return redirect('admin/thongtin');
    }
    public function hientheloai($id)//hiện thể loại
    {
        $theloai = \App\theloai::select('id','name')->where('id_menu',$id)->get();
        foreach ($theloai as $hientheloai) 
        {
            echo '<option value="'.$hientheloai->id.'">'.$hientheloai->name.'</option>';
        }
    }
    public function xoadonhang($id){
        $donhang = \App\donhang::all();
        $xoadonhang = $donhang->find($id)->delete();
        return redirect("admin/quanlydonhang");
    }
    public function hdmuahang(){
        $lienhe = \App\gioithieulienhe::all();
        return view('admin/muahang',['lienhe'=>$lienhe]);
    }
    public function hdthanhtoan(){
        $lienhe = \App\gioithieulienhe::all();
        return view('admin/thanhtoan',['lienhe'=>$lienhe]);
    }
    public function luuthanhtoan(Request $request){
        $thongtin = new \App\gioithieulienhe();
        $suathongtin=$thongtin::where('id','1')->first();
        $suathongtin->thanhtoan=$request->editor1;
        $suathongtin->save();
        return redirect('admin/thanhtoan');
    }
    public function luumuahang(Request $request){
        $thongtin = new \App\gioithieulienhe();
        $suathongtin=$thongtin::where('id','1')->first();
        $suathongtin->muahang=$request->editor1;
        $suathongtin->save();
        return redirect('admin/muahang');
    }
    public function thongbao(){
        $thongtin = \App\guimail::paginate(9);
        return view('admin/gmail',['thongtin'=>$thongtin]);
    }
    public function xoathongbao($id){
        $thongtin = \App\guimail::all();
        $xoathongtin = $thongtin->find($id)->delete();
        return back();
    }
}
