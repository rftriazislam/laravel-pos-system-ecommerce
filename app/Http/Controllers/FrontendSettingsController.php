<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrontendSettings;
use App\Category;

class FrontendSettingsController extends Controller
{
    public function home_page() {
        $categories = Category::select('*')
            ->where('parent_id','=',0)
            ->orderBy('name','asc')
            ->get();

        $new_categories = get_frontend_settings_value('New Product Category');
        $all_advertise_images = get_frontend_settings_value('Advertise Section');
        $all_slider_images = get_frontend_settings_value('Slider Section');
        return view('backend.frontend_settings.home_page.index',compact('categories','new_categories','all_advertise_images','all_slider_images'));
    }

    public function add_product_category(Request $request) {
        $categories = $request->category;
        $json_data = null;
        if ($categories) {
            $json_data = json_encode($categories);
        }
        $name = 'New Product Category';
        $frontend_settings = FrontendSettings::where('name','=',$name)->first();

        if ($frontend_settings) {
            $frontend_settings->update([
                'value' => $json_data,
            ]);
        } else {
            FrontendSettings::create([
                'name' => $name,
                'value' => $json_data,
            ]);
        }

        return redirect(route('frontend_settings.home_page'))->with('msg','New Product Categories Added Successfully');
    }

    public function advertise_section(Request $request) {
        if (isset($request->advertise_image)) {
            $advertise_image = upload_image($request->advertise_image,'public/uploads/advertise_images/');

            $all_images = array();
            $data = array('image_path'=>$advertise_image,'status'=>0);

            $name = 'Advertise Section';
            $frontend_settings = FrontendSettings::where('name','=',$name)->first();

            if ($frontend_settings) {
                if ($frontend_settings->value) {
                    $all_images = json_decode($frontend_settings->value);
                }
                array_push($all_images,$data);
                $json_data = json_encode($all_images);
                $frontend_settings->update([
                    'value' => $json_data,
                ]);
            } else {
                array_push($all_images,$data);
                $json_data = json_encode($all_images);
                FrontendSettings::create([
                    'name' => $name,
                    'value' => $json_data,
                ]);
            }
            $msg = 'Advertise Image Added Successfully';
        } else {
            $msg = 'Please Select Image First';
        }

        return redirect(route('frontend_settings.home_page'))->with('msg',$msg);
    }

    public function advertise_section_action($action,$index) {
        $all_images = array();
        $name = 'Advertise Section';
        $frontend_settings = FrontendSettings::where('name','=',$name)->first();

        if ($frontend_settings && $frontend_settings->value) {
            $all_images = json_decode($frontend_settings->value,true);

            if ($action == 'status') {
                if ($all_images[$index]['status'] == 0) {
                    $all_images[$index]['status'] = 1;
                    $status = 'Actived';
                } else {
                    $all_images[$index]['status'] = 0;
                    $status = 'Deactived';
                }
            }

            if ($action == 'delete') {
                $file_name = $all_images[$index]['image_path'];
                // echo $file_name; exit();
                if (file_exists($file_name)) {
                    unlink($file_name);
                }
                unset($all_images[$index]);
                $status = 'Deleted';
            }

            $json_data = json_encode($all_images);
            $frontend_settings->update([
                'value' => $json_data,
            ]);
        }

        return redirect(route('frontend_settings.home_page'))->with('msg','Advertise Image '.$status.' Successfully');
    }

    public function slider_section(Request $request) {
        if (isset($request->advertise_image)) {
            $advertise_image = upload_image($request->advertise_image,'public/uploads/slider_images/');

            $all_images = array();
            $data = array('image_path'=>$advertise_image,'status'=>0);

            $name = 'Slider Section';
            $frontend_settings = FrontendSettings::where('name','=',$name)->first();

            if ($frontend_settings) {
                if ($frontend_settings->value) {
                    $all_images = json_decode($frontend_settings->value);
                }
                array_push($all_images,$data);
                $json_data = json_encode($all_images);
                $frontend_settings->update([
                    'value' => $json_data,
                ]);
            } else {
                array_push($all_images,$data);
                $json_data = json_encode($all_images);
                FrontendSettings::create([
                    'name' => $name,
                    'value' => $json_data,
                ]);
            }
            $msg = 'Advertise Image Added Successfully';
        } else {
            $advertise_image = "";
            $msg = 'Please Select Image First';
        }

        return redirect(route('frontend_settings.home_page'))->with('msg',$msg);
    }

    public function slider_section_action($action,$index) {
        $all_images = array();
        $name = 'Slider Section';
        $frontend_settings = FrontendSettings::where('name','=',$name)->first();

        if ($frontend_settings && $frontend_settings->value) {
            $all_images = json_decode($frontend_settings->value,true);

            if ($action == 'status') {
                if ($all_images[$index]['status'] == 0) {
                    $all_images[$index]['status'] = 1;
                    $status = 'Actived';
                } else {
                    $all_images[$index]['status'] = 0;
                    $status = 'Deactived';
                }
            }

            if ($action == 'delete') {
                $file_name = $all_images[$index]['image_path'];
                // echo $file_name; exit();
                if (file_exists($file_name)) {
                    unlink($file_name);
                }
                unset($all_images[$index]);
                $status = 'Deleted';
            }

            $json_data = json_encode($all_images);
            $frontend_settings->update([
                'value' => $json_data,
            ]);
        }

        return redirect(route('frontend_settings.home_page'))->with('msg','Advertise Image '.$status.' Successfully');
    }

    public function contact_page() {
        $contact_info = get_frontend_settings_value('Contact Section');
        $icon_name = "plus-square";
        $button_name = 'Add Contact Info';
        if ($contact_info) {
            $icon_name = "edit";
            $button_name = "Edit Contact Info";
        }
        return view('backend.frontend_settings.contact_page.index',compact('contact_info','icon_name','button_name'));
    }

    public function contact_page_form(Request $request) {
        $contact_info = get_frontend_settings_value('Contact Section');
        $button_name = 'Save';
        if ($contact_info) {
            $button_name = 'Update';
        }
        return view('backend.frontend_settings.contact_page.action_form',compact('contact_info','button_name'));
    }

    public function contact_page_action(Request $request) {
        $name = 'Contact Section';
        $frontend_settings = FrontendSettings::where('name','=',$name)->first();
        $form_data = array(
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'address' => $request->address,
            'get_in_touch' => $request->get_in_touch,
        );
        $json_data = json_encode($form_data);

        if ($frontend_settings) {
            $frontend_settings->update([
                'value' => $json_data,
            ]);
        } else {
            FrontendSettings::create([
                'name' => $name,
                'value' => $json_data,
            ]);
        }

        return redirect(route('frontend_settings.contact_page'))->with('msg','Contact information Saved Successfully');
    }

    public function general_settings() {
        $logos = get_frontend_settings_value('Logo');
        $social_media_info = get_frontend_settings_value('Social Media');
        $copyright_info = get_frontend_settings_value('Copyright');
        // dd($social_media_info);
        return view('backend.frontend_settings.general_settings.index',compact('logos','social_media_info','copyright_info'));
    }

    public function frontend_logo(Request $request) {
        if (isset($request->logo_image)) {
            $logo_image = upload_image($request->logo_image,'public/uploads/logos/');

            $all_images = array();
            $data = array('image_path'=>$logo_image,'status'=>0);

            $name = 'Logo';
            $frontend_settings = FrontendSettings::where('name','=',$name)->first();

            if ($frontend_settings) {
                if ($frontend_settings->value) {
                    $all_images = json_decode($frontend_settings->value);
                }
                array_push($all_images,$data);
                $json_data = json_encode($all_images);
                $frontend_settings->update([
                    'value' => $json_data,
                ]);
            } else {
                array_push($all_images,$data);
                $json_data = json_encode($all_images);
                FrontendSettings::create([
                    'name' => $name,
                    'value' => $json_data,
                ]);
            }
            $msg = 'Logo Image Added Successfully';
        } else {
            $msg = 'Please Select Logo Image First';
        }

        return redirect(route('frontend_settings.general_settings'))->with('msg',$msg);
    }

    public function frontend_logo_action($action,$index) {
        $all_images = array();
        $name = 'Logo';
        $frontend_settings = FrontendSettings::where('name','=',$name)->first();

        if ($frontend_settings && $frontend_settings->value) {
            $all_images = json_decode($frontend_settings->value,true);

            if ($action == 'status') {
                if ($all_images[$index]['status'] == 0) {
                    $all_images[$index]['status'] = 1;
                    $status = 'Actived';
                } else {
                    $all_images[$index]['status'] = 0;
                    $status = 'Deactived';
                }
            }

            if ($action == 'delete') {
                $file_name = $all_images[$index]['image_path'];
                // echo $file_name; exit();
                if (file_exists($file_name)) {
                    unlink($file_name);
                }
                unset($all_images[$index]);
                $status = 'Deleted';
            }

            $json_data = json_encode($all_images);
            $frontend_settings->update([
                'value' => $json_data,
            ]);
        }

        return redirect(route('frontend_settings.general_settings'))->with('msg','Logo Image '.$status.' Successfully');
    }

    public function social_media(Request $request) {
        $name = 'Social Media';
        $frontend_settings = FrontendSettings::where('name','=',$name)->first();
        $form_data = array(
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'google_plus' => $request->google_plus,
            'pinterest' => $request->pinterest,
        );
        $json_data = json_encode($form_data);

        if ($frontend_settings) {
            $frontend_settings->update([
                'value' => $json_data,
            ]);
        } else {
            FrontendSettings::create([
                'name' => $name,
                'value' => $json_data,
            ]);
        }

        return redirect(route('frontend_settings.general_settings'))->with('msg','Social Media information Saved Successfully');
    }

    public function copyright(Request $request) {
        $name = 'Copyright';
        $frontend_settings = FrontendSettings::where('name','=',$name)->first();
        $form_data = array(
            'copyright_name' => $request->copyright_name,
            'copyright_link' => $request->copyright_link,
            'designed_by_name' => 'Ingenious Inside',
            'designed_by_link' => 'javascript:void(0)',
        );
        $json_data = json_encode($form_data);

        if ($frontend_settings) {
            $frontend_settings->update([
                'value' => $json_data,
            ]);
        } else {
            FrontendSettings::create([
                'name' => $name,
                'value' => $json_data,
            ]);
        }

        return redirect(route('frontend_settings.general_settings'))->with('msg','Copyright information Saved Successfully');
    }
}
