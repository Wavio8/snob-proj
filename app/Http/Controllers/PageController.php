<?php

namespace App\Http\Controllers;

use App\Enums\Content\BannersType;
use App\Enums\Content\GalleryType;
use App\Helpers\FileUpload;
use App\Models\Content\Address;
use App\Models\Content\Cases;
use App\Models\Content\Services;
use App\Models\Content\Team;
use App\Models\Content\Title;
use App\Models\Content\Vacancies;
use App\Models\Content\VacanciesGroups;
use App\Models\Utility\Page;
use App\Models\Content\Achievement;
use App\Models\Content\Banners;
use App\Models\Content\Gallery;
use App\Models\Content\TilesGroup;
use App\Models\Forms\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{


    //Главная страница
    public function main()
    {
        $vacanciesGroups = VacanciesGroups::where('hide', '<>', 1)->orderBy('rating', 'desc')->get();
        $mainBanner = Banners::where('type', BannersType::MAIN_BANNNER->name)->first();
        $mainTiles = TilesGroup::where('pageID', null)->first();
        $mainBannerGallery = Gallery::where('type', GalleryType::MAIN_BANNNER->name)->first();
        $mainGallery = Gallery::where('type', GalleryType::MAIN_GALLERY->name)->first();
        $achivments = Achievement::where('hide', '<>', 1)->get();
        $doctorBanner = Banners::where('type', BannersType::DOCTOR_BANNER->name)->first();
        $bestBanner = Banners::where('type', BannersType::BEST_BANNER->name)->first();



        return view('pages.main', [
            'vacanciesGroups' => $vacanciesGroups,
            'mainBanner' => $mainBanner,
            'doctorBanner' => $doctorBanner,
            'mainTiles' => $mainTiles,
            'mainBannerGallery' => $mainBannerGallery,
            'mainGallery' => $mainGallery,
            'achivments' => $achivments,
            'bestBanner' => $bestBanner,
        ]);
    }
    public function index()
    {
        $title=Title::orderBy('id', 'asc')->get();
        $services=Services::orderBy('id', 'asc')->get();
        $team = Team::where('hide', '<>', 1)->get();
        $cases = Cases::orderBy('id', 'asc')->get();
        $gallery = Gallery::where('type', GalleryType::SLIDER_1->name)->first();

//        $vacanciesGroups = VacanciesGroups::where('hide', '<>', 1)->orderBy('rating', 'desc')->get();
//        $mainBanner = Banners::where('type', BannersType::MAIN_BANNNER->name)->first();
//        $mainTiles = TilesGroup::where('pageID', null)->first();
//        $mainBannerGallery = Gallery::where('type', GalleryType::MAIN_BANNNER->name)->first();
//        $mainGallery = Gallery::where('type', GalleryType::MAIN_GALLERY->name)->first();
//        $achivments = Achievement::where('hide', '<>', 1)->get();
//        $doctorBanner = Banners::where('type', BannersType::DOCTOR_BANNER->name)->first();
//        $bestBanner = Banners::where('type', BannersType::BEST_BANNER->name)->first();



        return view('pages.index', [
            'title'=> $title,
            'services'=> $services,
            'team'=> $team,
            'cases'=> $cases,

//            'vacanciesGroups' => $vacanciesGroups,
//            'mainBanner' => $mainBanner,
//            'doctorBanner' => $doctorBanner,
//            'mainTiles' => $mainTiles,
//            'mainBannerGallery' => $mainBannerGallery,
            'gallery' => $gallery,
//            'achivments' => $achivments,
//            'bestBanner' => $bestBanner,
        ]);
    }





    public function vacancies()
    {
        $vacanciesGroups = VacanciesGroups::where('hide', '<>', 1)->orderBy('rating', 'desc')->get();


        return view('pages.vacancies.index', ['vacanciesGroups' => $vacanciesGroups, 'bgdisable' => true]);
    }
    public function vacanciesSingle(Request $request, int $vacancyID)
    {

        $vacancy = Vacancies::find($vacancyID);

        $vacanciesGroups = VacanciesGroups::where('hide', '<>', 1)->orderBy('rating', 'desc')->get();

        return view('pages.vacancies.single', ['vacanciesGroups' => $vacanciesGroups,  'vacancy' => $vacancy]);
    }



    public function about(Request $request)
    {

        $page = Page::where('url', $request->path())->first();

        $vacanciesGroups = VacanciesGroups::where('hide', '<>', 1)->orderBy('rating', 'desc')->get();
        $achivments = Achievement::where('hide', '<>', 1)->get();

        $aboutTiles = TilesGroup::where('pageID',  $page->id)->first();

        $bannerGallery = Gallery::where('type', GalleryType::ABOUT_BANNER->name)->first();
        $aboutGallery = Gallery::where('type', GalleryType::ABOUT_GALLERY->name)->first();

        $doctorBanner = Banners::where('type', BannersType::DOCTOR_BANNER->name)->first();

        $banner = Banners::where('type', BannersType::ABOUT_BANNER->name)->first();



        return view('pages.about', [
            'vacanciesGroups' => $vacanciesGroups,

            'doctorBanner' => $doctorBanner,
            'aboutTiles' => $aboutTiles,


            'bannerGallery' => $bannerGallery,
            'aboutGallery' => $aboutGallery,


            'achivments' => $achivments,
            'banner' => $banner,

        ]);
    }
    public function culture(Request $request)
    {

        $page = Page::where('url', $request->path())->first();

        $tiles = TilesGroup::where('pageID',  $page->id)->first();

        $gallery = Gallery::where('type', GalleryType::CULTURE_GALLERY->name)->first();

        $banner = Banners::where('type', BannersType::CULTURE_BANNER->name)->first();


        return view('pages.culture', ['gallery' => $gallery, 'tiles' => $tiles, 'banner' => $banner]);
    }
    public function education()
    {
        return view('pages.education');
    }
    public function contacts()
    {
        $addresses = Address::all();
        return view('pages.contacts', ['addresses' => $addresses]);
    }

    public function static($url)
    {
        $page = Page::where('url', $url)->first();
        if (!$page || $page->hide) abort(404);
        return view('pages.main', compact('page'));
    }


    public function page500()
    {
        return view('errors.500');
    }

    public function ajax(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email' => 'nullable|email:rfc',
            'tel' => 'required|string|regex:/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/i',
            'name' => 'required',
            'about' => 'required'
        ]);


        if ($v->passes()) {
            $item = new Requests();

            $item->name = $request->name;
            $item->phone = $request->tel;
            $item->email = $request->email;
            $item->about = $request->about;
            $item->vacancyID = $request->vacancyID ?? null;
            $item->save();


            if ($request->file)
                FileUpload::uploadFile('file', Requests::class, 'file', $item->id, '/files/requests');
        }


        $data = [
            'status' => $v->passes() ? 'success' : 'error',
            'message' =>  $v->messages(),
        ];

        echo  json_encode($data);
    }
}
