<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Visitors;
use App\Models\UserDetails;
use App\Models\Address;

class HomeController extends Controller
{
    
    public function saveVisitorDetails(Request $request)
    {
        try{
            $agent = new \Jenssegers\Agent\Agent;
            $device = $agent->platform();
            $user_agent = $agent->device();
            $browser = $agent->browser();
            $ip = $request->ip();
            $visitors = new Visitors();
            $visitors->ip_address = $ip;
            $visitors->device_type = $device;
            $visitors->browser = $browser;
            $visitors->user_agent = $user_agent;
            $visitors->save();
            Session::put('visitor', $ip);
            return response()->json([
                'success' => 'Data updated successfully!',
            ]);
        }catch (\Exception $e) {
            return back()->with('error','somethingwrong');
        }
    }
    
    public function saveContactDetails(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'DobDay' => 'required',
            'DobMonth' => 'required',
            'DobYear' => 'required',
            'email' => 'required|email|unique:user_details',
            'phone' => 'required|numeric|digits:10|unique:user_details',
        ], [
            'name.required' => 'Name required',
            'lastName.required' => 'Last name required',
            'DobDay.required' => 'DOB Day required',
            'DobMonth.required' => 'DOB Month required',
            'DobYear.required' => 'DOB Year required',
            'email.required' => 'Email required',
            'email.email' => 'Email not recognised',
            'phone.required' => 'Phone required',
            'phone.numeric' => 'Phone number should be numbers' ,
            'phone.digits' => 'Phone number should be 10 digit' ,
        ]);
        
        try{
            $dob = strftime("%F", strtotime($request->DobYear."-".$request->DobMonth."-".$request->DobDay));
            $user = new UserDetails();
            $user->name = $request->name;
            $user->last_name = $request->lastName;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->dob= $dob;
            $user->save();
            
            return response()->json([
                'success' => 'Data updated successfully!',
                'user_id' => $user->id,
            ]);
        }catch (\Exception $e) {
            return back()->with('error','somethingwrong');
        }
    }
    
    public function showAddressPage($id)
    {
        $user = UserDetails::find($id);
        if($user){
            return view('page02', compact('user'));
        }else{
            abort(404);
        }
    }
    
    public function addAddressDetails(Request $request)
    {
        $box = $request->all();        
        $myValue=  array();
        parse_str($box['data'], $myValue);
        try{
            $limit = count($myValue['line1']); 
            $msg = "Success !";
            for ($x = 0; $x < $limit; $x++) {
                $add = Address::where('user_id', '=', $myValue['visitor_id'])->where('line1', '=', $myValue['line1'][$x])->where('line2', '=', $myValue['line2'][$x])->first();
                if ($add === null) {
                    $address = new Address();
                    $address->user_id = $myValue['visitor_id'];
                    $address->line1 = $myValue['line1'][$x];
                    $address->line2 = $myValue['line2'][$x];
                    $address->line3 = $myValue['line3'][$x];
                    $address->save();
                }else{
                    $msg = "Sucess , But some Address exist in Table";
                }
            }
            return response()->json([
                    'success' => $msg
                ]);
        }catch (\Exception $e) {
                return back()->with('error','somethingwrong');
        }
  }
}
