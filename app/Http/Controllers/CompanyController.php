<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;
use App\Company;
use App\Gallery;
use App\CustomClass\CompanyData;
use Auth;
use App\CustomClass\Path;
use App\SubCategory;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::all();
        $user=User::where('type','member')->get();
        $member=[];
        foreach ($user as $data){
            $m=Member::find($data->member_id);
            array_push($member,$m);
        }
        return view('admin.site_admin.member.company')->with([
            'url' => 'company',
            'subcategories'=>$subcategory,
            'member'=>$member
        ]);

    }

    public function admin_company(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$member_id = Auth::user()->id;
        $file = $request->file('logo');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/upload/logo/', $fileName);

        $company_id = Company::create([
            'member_id' => $request->get('member_id'),
            'logo' => $fileName,
            'name' => $request->get('name'),
            'sub_category_id' => $request->get('sub_category'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'web_url' => $request->get('web_url'),
            'facebook_url' => $request->get('facebook_url'),
            'what-we-do' => $request->get('what-we-do'),
            'why-join-us' => $request->get('why-join-us'),
            'vision' => $request->get('vision'),
            'mission' => $request->get('mission'),
            'about-us' => $request->get('about-us'),
            'type'=>$request->get('type'),
            'ads_date'=>$request->get('ads_date')
        ])->id;

            if ($photo = $request->file('photos')) {
                foreach ($photo as $photo_data){
                    $photoName = uniqid() . '_' . $photo_data->getClientOriginalName();
                    $photo_data->move(public_path() . '/upload/photo/', $photoName);
                    Gallery::create([
                        'photo' => $photoName,
                        'company_id' => $company_id
                    ]);
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_data_obj = new CompanyData($id);
        $company_detail = $company_data_obj->getCompanyData();
        return json_encode($company_detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        if($request->hasFile('logo')){
            $photo = $request->file('logo');
            $photo_name = uniqid().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('upload/logo/'),$photo_name);
            $company = Company::find($id);
            $image_path=public_path().'/upload/logo/'.$company->logo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            Company::findOrFail($id)->update([
                'logo' => $photo_name,
                'name' => $request->get('name'),
                'sub_category_id' => $request->get('sub_category'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'web_url' => $request->get('web_url'),
                'facebook_url' => $request->get('facebook_url'),
                'what-we-do' => $request->get('what-we-do'),
                'why-join-us' => $request->get('why-join-us'),
                'vision' => $request->get('vision'),
                'mission' => $request->get('mission'),
                'about-us' => $request->get('about-us'),
                'type'=>$request->get('type'),
                'ads_date'=>$request->get('ads_date')
            ]);
        }else {
            Company::findOrFail($id)->update([
                'name' => $request->get('name'),
                'sub_category_id' => $request->get('sub_category'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'web_url' => $request->get('web_url'),
                'facebook_url' => $request->get('facebook_url'),
                'what-we-do' => $request->get('what-we-do'),
                'why-join-us' => $request->get('why-join-us'),
                'vision' => $request->get('vision'),
                'mission' => $request->get('mission'),
                'about-us' => $request->get('about-us'),
                'type'=>$request->get('type'),
                'ads_date'=>$request->get('ads_date')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company_gallery = Gallery::where('company_id',$id)->get();

         $image_path=public_path().'/upload/logo/'.$company->logo;
         if(file_exists($image_path)){
             unlink($image_path);
         }
////
        foreach ($company_gallery as $item){
            $image_path1=public_path().'/upload/photo/'.$item['photo'];
            if(file_exists($image_path1)){
                unlink($image_path1);
            }
            $item->delete();
        }
        $company->delete();

        

    }

    public function get_all_company(){
        if (Auth::user()->type=='admin'){
            $company = Company::orderBy('id', 'desc')->get();
        }
        else{
            $member_id = Auth::user()->member_id;
            $company = Company::where('member_id',$member_id)->orderBy('id', 'desc')->get();
        }
        $arr = CompanyData::getCompanyFormat($company);
        return json_encode($arr);
    }

    public function company_detail($id){
        $company_data_obj = new CompanyData($id);
        $company_detail = $company_data_obj->getCompanyData();
        return view('admin.site_admin.member.company_detail')->with([
            'url' => 'company',
            'company_detail' => $company_detail
        ]);
    }

    public function photo_detail($id){
        $gallery = Gallery::where('company_id',$id)->get();
        $arr = [];
        foreach($gallery as $gallery_data){
            array_push($arr,$gallery_data);
        }
        // return $arr;
        return view('admin.site_admin.member.company_photos')->with([
            'url' => 'company',
            'gallery' => $arr
        ]);
    }

    public function company_onephoto($id){
        $gallery_each = Gallery::find($id);
        $gallery_each['photos_url']=Path::$domain_url."upload/photo/".$gallery_each->photo;
      //   return $gallery_each;
          return json_encode($gallery_each);
      }

      public function update_photos(Request $request){
        $id = $request->get('id');
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = uniqid().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('upload/photo/'),$photo_name);
            $gallery = Gallery::find($id);
            $image_path=public_path().'/upload/photo/'.$gallery->photo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $result = Gallery::findOrFail($id)->update([
                'photo' => $photo_name
            ]);
            if($result){
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }
    }
}
