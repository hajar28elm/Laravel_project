<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Wishlist;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
   
    public function updateWishlist(Request $request){
       if($request->ajax()){
         $data = $request->all();
         $countWishlist = Wishlist::countWishlist($data['course_id']);
         $wishlist = new Wishlist();
          if($countWishlist == 0){
            $wishlist->course_id = $data['course_id'];
            $wishlist->student_id = $data['student_id'];
            $wishlist->save();
            return response()->json(['action' => 'add' , 'message' => 'course added successfully to wishlist']);
         }
         else {
            Wishlist::where(['student_id' => Auth::user()->id,'course_id'=> $data['course_id']])->delete();
            return response()->json(['action' => 'remove' , 'message' => 'course removed successfully from wishlist']);
         }
       }
    
    }

     public function totalWishlist(){
        $total_wishlist = Wishlist::where(['student_id' => Auth::user()->id])->count();
         echo json_encode($total_wishlist);
    }

    public function simulateFakePayment(Request $request,$course_id)
    {
        
        Session::put('fake_payment_made', true);
        $inscription = new Inscription();
        $inscription->course_id = $course_id;
        $inscription->student_id = Auth::user()->id;
        $inscription->status = 'approved';
        $inscription->save();
        $course = Courses::where(['id' => $course_id])->first();
        return view('user.learning.index',compact('course'));
    }
      
    public function joinCourse(Request $request,$course_id)
    {
        $countInscription = Inscription::where(['student_id' => Auth::user()->id,'course_id' => $course_id])->count();
        //Gate::allows('makeFakePayment', auth()->user()) &&
        if ($countInscription > 0) {
            $course = Courses::where(['id' => $course_id])->first();
            return view('user.learning.index',compact('course'));
        } else {
            return view('user.learning.payment',compact('course_id'));
        }
    }
}
