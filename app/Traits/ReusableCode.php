<?php

namespace App\Traits;
use App\Agent;
use App\Mail\UserRegistered;
use App\Refererlink;
use App\User;
use App\Subscription;
use App\ProviderSubscription;
use App\Payment;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Config;
use Illuminate\Http\Request;


trait ReusableCode
{

public function createSlug($name, $model, $id = 0)
    {
        // $slug = str_slug($this->name);
        $slug = Str::of($name)->slug('-');
        $allSlugs = $this->getRelatedSlugs($slug, $model, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }

    protected function getRelatedSlugs($slug, $model, $id = 0)
    {
        return $model::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }

}
