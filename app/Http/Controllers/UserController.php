<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Models\User;
use App\Models\Customer;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $customers = Customer::withCount('post')->get();
        $totalUsers = count($customers);
        foreach($customers as $customer){
            $customer->created_at = $customer->user()->created_at->diffForHumans($now);
        }
        return view('user.users', [
            'customers' => $customers,
            'totalUsers' => $totalUsers
        ]);
    }

    public function view($id){
        $user = User::find($id);
        $createdAt= $user->created_at;
        $now = Carbon::now();
        $timeJoined = $createdAt->diffForHumans($now);
        $customer = Customer::withCount(['post', 'questions'])->where('id', $id)->first();
        if(is_null($customer)){
            $displayName = $user->name;
        }else{
            $displayName = $customer->display_name;
            $location = $customer->location;
            $title = $customer->title;
            $image = $customer->image;
            $aboutMe = $customer->about_me;
            $websiteLink = $customer->website_link;
            $githubLink = $customer->github_link;
            $postCount = $customer->post_count;
            $questionCount = $customer->questions_count;
            $answerCount = $postCount - $questionCount;
        }
        return view('user.view', [
            'id' => $id,
            'displayName' => $displayName,
            'location' => $location??"unknown",
            'title' => $title??"unknown",
            'timeJoined' => $timeJoined,
            'image' => $image??"",
            'aboutMe' => $aboutMe??"unknown",
            'websiteLink' => $websiteLink??"unknown",
            'githubLink' => $githubLink??"unknown",
            'postCount' => $postCount??0,
            'questionCount' => $questionCount??0,
            'answerCount' => $answerCount??0
        ]);
    }

    public function edit($id){
        $customer = Customer::find($id);
    
        return view('user.edit', [
            'id'           => $id,
            'displayName' => $customer->display_name??"",
            'location'     => $customer->location??"",
            'title'        => $customer->title??"",
            'image'        => $customer->image??"css\\577351.png", 
            'aboutMe'     => $customer->about_me??"",
            'githubLink'  => $customer->github_link??"",
            'websiteLink' => $customer->website_link??""
        ]);
    }

    public function update($id, Request $request){
        // $directory = public_path('public/avt/');
        // $files = Storage::deleteDirectory($directory);
        // dump($request);
        // validate

        // file handle
        $file = $request->file('avt');
        if(!is_null($file)){
            $filename = $file->getClientOriginalName().'.'.$file->extension();
            $movepath = "avt\\".$id;
            $file->move(public_path($movepath), $filename);
            $path = $movepath.'\\'.$filename;
        }
        // save
        Customer::updateOrCreate(
            ['id' => $id],
            [
                'display_name' => $request->displayName,
                'location'     => $request->location,
                'title'        => $request->title,
                'image'        => $path??null, 
                'about_me'     => $request->aboutMe,
                'github_link'  => $request->githubLink,
                'website_link' => $request->websiteLink
            ]
        );

        return redirect()->route('users.view', $id);
    }

    public function customerDetail($customerId){
        $customer = Customer::find($customerId);
        return view('admin.components.modal.modal_user', ['data' => $customer]);
    }

    public function userDelete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'Delete user success!']);
    }
}