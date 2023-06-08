<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slide;
use App\Models\Phim;
use App\Models\User;
use App\Models\LichChieu;
use App\Models\Combo;
use App\Models\DatVe;
use App\Models\CmtPhim;
use App\Models\Ghe;
use App\Models\DatGhe;
use App\Models\Ve;
use App\Models\Phong;
use App\Models\Rap;
use App\Models\DatCombo;
use App\Models\TinTuc;
use Illuminate\Support\collection;

class HomeController extends Controller
{
    public function trangchu()
    {
        $slide=slide::limit(3)->get();
        $phimdc=phim::where('trangthai','1')->limit(4)->get();
        $phimsc=phim::where('trangthai','0')->limit(4)->get();
        $review=tintuc::where('theloai',1)->get();
        $blog=tintuc::where('theloai',0)->get();
        return view('trangchu',compact('slide','phimdc','phimsc','review','blog'));
    }
    public function chitietphim($idphim)
    {
        $title=phim::select('tenphim')->where('id',$idphim)->get();
        foreach ($title as $td) {
            $tieude=$td->tenphim;
        }
        $phim=phim::where('id',$idphim)->get();
        $phimlq=phim::where('trangthai','1')
        ->inRandomOrder()->limit(3)->get();

        $cmtphim=cmtphim::where('id_phim',$idphim)->get();

        $lich=lichchieu::where('id_phim',$idphim)->groupby('id_rap')->distinct()->get();

        for($i=0;$i<count($lich);$i++){
            $n=lichchieu::where([['id_phim',$idphim],['id_rap',$lich[$i]->id_rap]])->groupby('ngay')->distinct()->get();
                for ($k=0; $k <count($n) ; $k++) {
                    $p=lichchieu::where([['id_phim',$idphim],['id_rap',$lich[$i]->id_rap],['ngay',$n[$k]->ngay]])->groupby('id_phong')->distinct()->get();
                    for($j=0;$j<count($p);$j++){
                        $t=lichchieu::where([['id_phim',$idphim],['id_rap',$lich[$i]->id_rap],['ngay',$n[$k]->ngay],['id_phong',$p[$j]->id_phong]])->get();
                        $p[$j]['time']=$t;
                }
                $n[$k]['id_phong']=$p;
                }

                $lich[$i]['ngay']=$n;
        }
        // dd($lich);

         return view('phim',compact('tieude','phim','phimlq','lich','cmtphim'));
    }

     public function chitietdatve($id)
    {
        $lichchieu=lichchieu::where('id',$id)->get();
        $cb=combo::all();
        foreach ($lichchieu as $lc) {
            $idp=$lc->id_phong;
        }
        // $datghe=datghe::where('id_lichchieu',$id)->get();
        $ghe=ghe::where('id_phong',$idp)->groupby('row')->distinct()->get();
        for($i=0;$i<count($ghe);$i++){
            $g=ghe::where([['id_phong',1],['row',$ghe[$i]->row]])->get();

            $ghe[$i]['number']=$g;
        }

        $ve=ve::where('id_lichchieu',$id)->get();
        return view('datve',compact('lichchieu','cb','ghe','ve'));
    }

    public function review($id)
    {
        $review=tintuc::where([['id',$id],['theloai',1]])->get();
        return view('Review',compact('review'));
    }

    public function blog($id)
    {
        $blog=tintuc::where([['id',$id],['theloai',0]])->get();
        return view('blog',compact('blog'));
    }

    public function phimdangchieu()
    {
        $phimdc=phim::where('trangthai','1')->get();
        return view('phimdangchieu',compact('phimdc'));
    }
    public function phimsapchieu()
    {
        $phimsc=phim::where('trangthai','0')->get();
        return view('phimsapchieu',compact('phimsc'));
    }
    public function formdangnhap()
    {
        return view('.login.dangnhap');
    }


    public function getdangky()
    {
        return view('.login.dangky');
    }
    public function postdangky(Request $request)
    {
        $this->validate($request,[
            'pass'=>'required|min:3',
            'repass'=>'required|min:3|same:pass'
        ],[
            'repass.same'=>'Bạn chưa nhập lại mật khẩu'
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->pass);
        $user->save();
        return redirect('/');

    }
    public function dangxuat()
    {
        Auth::logout();
        return redirect('/');
    }


    public function datve(Request $req)
    {
        $ghe=$req->allseat;
        for ($i=0; $i < count($ghe) ; $i++) {
            $ve=ve::where([['id_lichchieu',$req->idlich],['id_ghe',$ghe[$i]]])->update([
                'id_user'=>$req->iduser
            ]);
        }
        $combo=$req->allcombo;
        for ($i=0; $i <count($combo) ; $i++) {
            $cb = new datcombo;
            $cb->id_lichchieu=$req->idlich;
            $cb->id_user=$req->iduser;
            $cb->id_combo=$combo[$i]['idcb'];
            $cb->soluong=$combo[$i]['slcb'];
            $cb->save();
        }

    }
    public function postcmt(Request $request,$id)
    {
        $cmt=new cmtphim;
        $cmt->id_phim=$id;
        $cmt->id_user=Auth::user()->id;
        $cmt->noidung=$request->noidungcmt;
        $cmt->save();

        return redirect()->back();
    }
}
