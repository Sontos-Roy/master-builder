<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutShortSection;
use App\Models\brandImage;
use App\Models\CoreValues;
use App\Models\Designs;
use App\Models\flatDesign;
use App\Models\Footer;
use App\Models\footerBar;
use App\Models\frontpageCover;
use App\Models\HomeGallery;
use App\Models\HomeSlider;
use App\Models\Management;
use App\Models\Media;
use App\Models\Media_Tag;
use App\Models\OtherSection;
use App\Models\progressCounter;
use App\Models\Projects;
use App\Models\QuatSection;
use App\Models\socialMedia;
use App\Models\Story_slider;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    function index(){
        $this->data['page_title'] = "Home Page";
        $this->data['social'] = socialMedia::first();
        $this->data['home_gallery'] = HomeGallery::all()->first();
        $this->data['sliders'] = HomeSlider::all();
        $this->data['progress_counter'] = progressCounter::all();
        $this->data['brand_image'] = brandImage::all()->first();
        $this->data['quat_sec'] = QuatSection::all()->first();
        $this->data['feature_project'] = Projects::all()->take(3);
        $this->data['recent_project'] = Projects::orderBy('id', 'desc')->take(3)->get();
        $this->data['invite'] = OtherSection::where('sec_name', 'invite')->first();
        $this->data['progress_sec'] = OtherSection::where('sec_name', 'progress')->first();
        $this->data['design'] = OtherSection::where('sec_name', 'design')->first();
        $this->data['featured'] = Projects::where('status', 'featured_project')->get();
        $this->data['recent'] = Projects::where('status', 'recent_project')->get();
        $this->data['member'] = OtherSection::where('sec_name', 'memberOff')->first();
        $this->data['featured_project_sec'] = OtherSection::where('sec_name', 'featured_project')->first();
        $this->data['recent_projects_sec'] = OtherSection::where('sec_name', 'recent_project')->first();
        $this->data['roomDesign'] = Designs::all();
        $this->data['flat_sec'] = flatDesign::all()->first();
        return view('frontend.index', $this->data);
    }
    function about(){
        $this->data['banner'] = frontpageCover::where('page_name', 'about')->first();
        $this->data['wishtojoin'] = OtherSection::where('sec_name', 'wishtojoin')->first();
        $this->data['managment'] = OtherSection::where('sec_name', 'management')->first();
        $this->data['ourvalue'] = OtherSection::where('sec_name', 'corevalues')->first();
        $this->data['story'] = OtherSection::where('sec_name', 'story')->first();
        $this->data['aboutshortsec'] = AboutShortSection::all();
        $this->data['corevalues'] = CoreValues::all();
        $this->data['story_slider'] = Story_slider::all();
        $this->data['member'] = Management::all();
        return view("frontend.about", $this->data);
    }
    function properties(){
        $this->data['cover'] = frontpageCover::where('page_name', 'Properties')->first();
        $this->data['ongoing'] = Projects::where('status', 'Under-Constraction')->get();
        $this->data['complete'] = Projects::where('status', 'Completed')->get();
        $this->data['under_cons'] = OtherSection::where('sec_name', 'ongoing_project')->first();
        $this->data['completed_sec'] = OtherSection::where('sec_name', 'completed_project')->first();
        return view('frontend/properties', $this->data);
    }
    function media(){
        $this->data['cover'] = frontpageCover::where('page_name', 'Media')->first();
        $this->data['gal_tag'] = Media_Tag::all();
        $this->data['media'] = Media::all();
        return view('frontend/media', $this->data);
    }
    function contact(){
        $this->data['cover'] = frontpageCover::where('page_name', 'Contact')->first();
        $this->data['contact_sec'] = OtherSection::where('sec_name', 'contact')->first();
        $this->data['footerBar'] = footerBar::first();
        $this->data['footerInfo'] = Footer::first();
        return view('frontend/contact', $this->data);
    }
    function message(){
        return view('frontend.message');
    }
}
