<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trangchuController extends Controller
{
    public function trangchu(){
    	$menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        $haisan = \App\haisan::orderBy('id','desc')->get();
        $urlslide = \App\urlslide::all();
        return view('trangchu',["url"=>$urlslide,"menu"=>$menu,"lienhe"=>$lienhe,"haisan"=>$haisan]);
    }
    public function sanpham($id){
    	$chitietsanpham = \App\haisan::where('url',$id)->first();
        if($chitietsanpham !=null){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        $imgbv = \App\imgbaiviet::where("id_haisan","=",$chitietsanpham->id)->get();
        $sanpham1 = \App\haisan::inRandomOrder()->where("url","<>",$id)->where("id_menu","=",$chitietsanpham->id_menu)->limit(8)->get();
        return view('trangcon',["hinhanh"=>$imgbv,"sanpham"=>$sanpham1,"sp"=>$chitietsanpham,"menu"=>$menu,"lienhe"=>$lienhe]);
        }

    }
    public function trangcha($id){
    	$menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        foreach ($menu as $mn) {
            if($mn->url==$id)
            {
                $idd=$mn->id;
            }
        }
    	$haisan = \App\haisan::where("id_menu","=",$idd)->orderBy('id','desc')->paginate(8);
        $menu1 = \App\menu::where('url','=',$id)->first();
        $theloai = \App\theloai::all();
    	return view('trangcha',["id"=>$menu1,"menu"=>$menu,"thongtin"=>$haisan,"lienhe"=>$lienhe,"theloai"=>$theloai]);
    }
    public function phanloai($id1,$id){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $theloai = \App\theloai::all();
        $lienhe = \App\lienhe::all();
        foreach ($menu as $mn) {
            if($mn->url==$id1){
                foreach ($theloai as $tl) {
                    if($tl->url==$id)
                    {
                        $menu1 = \App\menu::where('url','=',$id1)->first();
                        $haisan = \App\haisan::where("id_theloai","=",$tl->id)->paginate(8);
                    }
                }
            }
        }
        return view('trangcha',["id"=>$menu1,"menu"=>$menu,"thongtin"=>$haisan,"lienhe"=>$lienhe,"theloai"=>$theloai]);
    }
    public function gioithieu(){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        $thongtin = \App\gioithieulienhe::all();
        return view('gioithieu',["menu"=>$menu,"lienhe"=>$lienhe,'thongtin'=>$thongtin]);
    }
    public function lienhe(){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        $thongtin = \App\gioithieulienhe::all();
        return view('lienhe',["menu"=>$menu,"lienhe"=>$lienhe,'thongtin'=>$thongtin]);
    }
    public function tintuc($id){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        $haisan = \App\haisan::where("url","=",$id)->get();
        return view('tintuc',["menu"=>$menu,"lienhe"=>$lienhe,"haisan"=>$haisan]);
    }
    public function thanhtoan(){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        $thongtin = \App\gioithieulienhe::all();
        return view('thanhtoan',["menu"=>$menu,"lienhe"=>$lienhe,'thongtin'=>$thongtin]);
    }
    public function muahang(){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        $thongtin = \App\gioithieulienhe::all();
        return view('muahang',["menu"=>$menu,"lienhe"=>$lienhe,'thongtin'=>$thongtin]);        
    }
    public function timkiem(Request $request){
        $menu = \App\menu::orderBy("tt","ASC")->offset(2)->limit(14)->get();
        $lienhe = \App\lienhe::all();
        foreach($menu as $mn){
            if($mn->name=="tin tức")
            $haisan = \App\haisan::where('title','like','%' .$request->tukhoa. '%')->where("id_menu","<>",$mn->id)->paginate(8);  
        }
        return view('timkiem',["thongtin"=>$haisan,"menu"=>$menu,"lienhe"=>$lienhe,'tukhoa'=>$request->tukhoa]);
    }
    public function guimail(Request $request){
        $mail = new \App\guimail();
        $mail->gmail=$request->gmail;
        $mail->save();
        return back();
    }
}
