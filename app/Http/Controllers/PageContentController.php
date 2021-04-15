<?php

namespace App\Http\Controllers;

use App\General_Info;
use App\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function saveAgentModal()
    {

    }

    public function pagescontents()
    {
        return view('admin.page_management.pages_contents');
    }

    public function saveAboutUs(Request $request)
    {
        $general_info = General_Info::find(1);

        $general_info->about_site = $request->about_site;

        if ($general_info->update()) {
            return redirect()->back()->with([
                'message' => 'About Page Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'About page could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function saveAboutUsSection1(Request $request)
    {
        $general_info = PageContent::find(1);

        $general_info->about_site_section_1 = $request->about_site_section_1;

        if ($general_info->update()) {
            return redirect()->back()->with([
                'message' => 'About Page Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'About page could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function saveAboutUsSection2(Request $request)
    {
        $general_info = PageContent::find(1);

        $general_info->about_site_section_2 = $request->about_site_section_2;

        if ($general_info->update()) {
            return redirect()->back()->with([
                'message' => 'About Page Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'About page could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function saveAboutUsSection3(Request $request)
    {
        $general_info = PageContent::find(1);

        $general_info->about_site_section_3 = $request->about_site_section_3;

        if ($general_info->update()) {
            return redirect()->back()->with([
                'message' => 'About Page Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'About page could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function savePrivacyPolicy(Request $request)
    {
        $page_contents = PageContent::find(1);

        $page_contents->privacy_policy = $request->privacy_policy;

        if ($page_contents->update()) {
            return redirect()->back()->with([
                'message' => 'Privacy Policy Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Privacy Policy could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function saveBenefitsofEfcontact(Request $request)
    {
        $page_contents = PageContent::find(1);

        $page_contents->benefit_of_efcontact = $request->benefit_of_efcontact;

        if ($page_contents->update()) {
            return redirect()->back()->with([
                'message' => 'Benefits of EFContact Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Benefits of EFContact could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function saveTermOfUse(Request $request)
    {
        $page_contents = PageContent::find(1);

        $page_contents->term_of_use = $request->term_of_use;

        if ($page_contents->update()) {
            return redirect()->back()->with([
                'message' => 'Term of Use Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Term of Usecould not be updated!',
            'alert-type' => 'error'
        ]);
    }
}
