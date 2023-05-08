<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article as Article;
use App\Models\V_article as V_article;
use App\Models\administrateur as Administrateur;
use App\Models\categorie as Categorie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Session\Store;
use App\Http\Requests\ImageUploadRequest;
class ArticleController extends Controller
{
    //
    public function start(){
        $data=['message'=>''];
        return view('backlog',$data);
    }

    public function logadmin(Request $request){
        $administrateur=Administrateur::where([
            'identifiant'=>$request->input('identifiant'),
            'password'=>md5($request->input('password'))
        ])->first();
        // dd($administrateur);
        if($administrateur!=null){
            session()->put('user', $administrateur);
            return redirect()->route('liste');
        }else{
            return redirect()->route('start')->with('message','You are not connected');
        }
    }
    public function create(){
        $listecategorie=new Categorie();
        $data=['listecategorie'=>$listecategorie->all()];
        return view('save',$data);
    }

    public function slugtitle($titre){
        return Str::slug($titre);
    }

    
    
    public function addslug(object $o,$field,$title){
        $o[$title]=$this->slugtitle($o[$field]);
    }

    public function disconnect(){
        session()->forget('user');
        return redirect()->route('start');
    }


    public function save(Request $resquest,ImageUploadRequest $pic){
        $fields=["titre","resume","categorie","contenu"];
        $vaovao=new Article();
        foreach($fields as $f){
            $vaovao[$f]=$resquest->input($f);
        }
        // dd($pic->image);
        $vaovao->image='data:image/jpeg;base64,'.$this->upload($pic);
        $vaovao->save();
        return redirect()->route('liste');
    }

    public function upload(ImageUploadRequest $request){
     
        if($request->image!=null){
            $filename=time().'.'.$request->image->extension();
            // $request->image->move(public_path('images'), $filename);
            $contents = file_get_contents($request->image->getRealPath());
            $base64 = base64_encode($contents);
            return $base64;
        }
    }


    public function list(Request $request){
        $ar=new V_article();
       if($request->input('q')!==null){
        $a=$request->input('q');
        $ar=$ar->where('title', 'like', '%'.$a.'%')
        ->orWhere('description', 'like', '%'.$a.'%');
       }
        $liste= $ar->orderByDesc('datecreation')->paginate(3);
        foreach($liste as $l){ $this->addslug($l,'titre','slug'); }

        $data=['liste'=>$liste];
        return view('liste',$data);

    }

    public function show($id){
        $alefa=V_article::find($id);
        $this->addslug($alefa,'titre','slug');
        $data=['article'=>$alefa];
        $view=view('fiche',$data)->render();
        $key='fiche-'.$id;
        if(!Cache::has($key)){
            Cache::put($key, $view);
        }
        return Cache::get($key);
    }

    public function update($id,$titre){
        $alefa=V_article::find($id);

        $listecategorie=new Categorie();
        $data=['listecategorie'=>$listecategorie->all(),'article'=> $alefa];
        return view('update',$data);
    }

    public function exeupdate($id,Request $resquest){
        $update=[];
        $fields=["titre","resume","categorie","contenu"];
        foreach($fields as $f){
            $update[$f]=$resquest->input($f);
        }
        Article::find($id)->update($update);

        $key='fiche-'.$id;
        if(Cache::has($key)){
            Cache::forget($key);
        }
            $alefa=V_article::find($id);
        $this->addslug($alefa,'titre','slug');
        $data=['article'=>$alefa];
        $view=view('fiche',$data)->render();
        Cache::put('fiche-'.$id, $view);
        return Cache::get('fiche-'.$id);
        // return redirect('/')->with('status', 'Your changes have been saved.');

    }
}


// $user = App\Models\User::find(1);
// $user = App\Models\User::where('email', 'user@example.com')->first();
// $admins = App\Models\User::where('role', 'admin')->get();
// $user = DB::table('users')->where('name', 'John')->first();
// return $user->email;
    