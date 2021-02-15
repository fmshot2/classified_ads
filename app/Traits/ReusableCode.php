<?php 
 namespace App\Traits;
 trait ReusableCode
 {
     public function printThis()     
     {               
         echo "Trait executed";    
         dd($this);           
     }
     public function anotherMethod()
     {
         echo "Trait - anotherMethod() executed";
     }


     
    public function findNearestRestaurants(Request $request)
{
  // return $request->radius;
  $latitude = $request->latitude;
    $longitude = $request->longitude;
    $radius = 100;
    // $keyword = $request->radius,
    // $categories = $request->categories, 
    // $sub_category = $request->sub_category, 
    // $myRange = $request->myRange, 
    // $state =  $request->state, 
    // $city = $request->city
// $latitude = Auth::user()->latitude;
// $longitude = Auth::user()->longitude;
// Auth::user()->save();
   // return $latitude . $longitude;
    // $latitude = 
    $services = Service::selectRaw("id, name, address,
                     ( 6371000 * acos( cos( radians(?) ) *
                       cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
                       ) + sin( radians(?) ) *
                       sin( radians( latitude ) ) )
                     ) AS distance", [$latitude, $longitude, $latitude])
        ->having("distance", "<", $radius)
        ->orderBy("distance",'asc')
        ->offset(0)
        ->limit(20)
        ->get();

    return $services;
}
 }  