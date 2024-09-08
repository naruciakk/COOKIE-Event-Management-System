<?php

namespace EventTool\Http\Controllers;

use EventTool\User;
use EventTool\Event;
use EventTool\Signs;
use EventTool\Day;
use EventTool\Prerogative;
use EventTool\Rank;

use Illuminate\Http\Request;
use EventTool\Classes\AuthChecking;

use EventTool\Http\Requests;
use EventTool\Http\Controllers\Controller;

use Auth;
use Hash;

class PanelController extends Controller
{
    public function index() {
    	if (Auth::check()) {
    		$user = Auth::user();

            if(!AuthChecking::checkAuth(0))
                if($user->payment_paid == 0) return view('panel.paymentShow', compact('user'));
                else return view('panel.main', compact('user'));
            else return view('panel.main', compact('user'));

    	}
    	else return view('auth.login');
    }

    public function userPanel() {
    	if(Auth::check()) {
    		$admin = Auth::user();
    		$users = User::all();
            $prerogative[1] = AuthChecking::checkAuth(1);
            $prerogative[2] = AuthChecking::checkAuth(2);

    		if(($prerogative[1])) return view('panel.userList')->with(compact('users'))->with(compact('admin'))->with(compact('prerogative'));
    		else return redirect('/');
    	}
    	else return redirect('/');
    }

    public function userActivate($id) {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(2)) {
                $user = User::findOrFail($id);

                return view('panel.userActivation', compact('user'));
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    public function userActivateAction(Request $request) {
    	if(Auth::check()) {
            $id = $request->user_id;
    		$users = User::findOrFail($id);

            if(AuthChecking::checkAuth(2)) {
                if($users->sign == NULL) {
                    $users->sign = $request->list_number;
                    $users->notes = $request->notes;
                    if($users->payment_paid == 0) $users->payment_paid = 2;
                    $users->save();

                    return redirect('/panel/users');
                }
            }
            else return redirect('/');
    	}
    	else return redirect('/');
    }

    public function userDelete($id) {
    	if(Auth::check()) {
    		$users = User::findOrFail($id);

    		if(AuthChecking::checkAuth(0) && $users->admin == 0) {
    			$users->forceDelete();

    			return redirect('panel/users');
    		}
    		else return redirect('/');
    	}
    	else return redirect('/');
    }

    public function userEdit($id) {
    	if(Auth::check()) {
    		$users = User::findOrFail($id);

    		if(AuthChecking::checkAuth(0)) {
    			return view('panel.userEdit', compact('users'));
    		}
    		else return redirect('/');
    	}
    	else return redirect('/');
    }

    public function userEditAction(Request $request) {
    	if(Auth::check()) {
    		$users = User::findOrFail($request->id);

    		if(AuthChecking::checkAuth(0)) {
    			$users->name = $request->name;
                $users->nickname = $request->nickname;
    			$users->email = $request->email;
                $users->sign = $request->sign;
    			if(AuthChecking::checkAuth(0)) $users->rank = $request->rank;
                $users->city = $request->city;
                $users->adult = $request->adult;
                $users->night = $request->night;
                $users->discount = $request->discount;
                $users->notes = $request->notes;
    			$users->save();

    			return redirect('panel/users');
    		}
    	}
    	else return redirect('/');
    }

    public function userAdd() {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(2)) return view('panel.userAdd');
            else redirect('/');
        }
        else return redirect('/');
    }

    public function userAddAction(Request $request) {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(2)) {
                $users = new User;

                $email = ($request->nickname).($request->sign)."@example.org";

                $users->name = $request->name;
                $users->nickname = $request->nickname;
                $users->email = $email;
                $users->city = $request->city;
                $users->sign = $request->sign;
                $users->password = $email;
                $users->on_event = 1;
                $users->night = $request->night;
                $users->adult = $request->adult;
                $users->notes = $request->notes;
                $users->notes = $request->notes;

                $users->save();

                return redirect('panel/users');
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    public function eventPanel() {
        if(Auth::check()) {
            $events = Event::all();

            if(AuthChecking::checkAuth(0)) return view('panel.eventList', compact('events'));
            else return redirect('/');
        }
        else return redirect('/');
    }

    public function eventDelete($id) {
        if(Auth::check()) {
            $events = Event::findOrFail($id);

            if(AuthChecking::checkAuth(0)) {
                $events->forceDelete();

                return redirect('panel/events');
            }
            else redirect('/');
        }
        else return redirect('/');
    }

    public function eventAdd() {
        if(Auth::check()) {
            $user = Auth::user();
            $days = Day::all();

            if(AuthChecking::checkAuth(0)) return view('panel.eventAdd', compact('days'));
            else redirect('/');
        }
        else return redirect('/');
    }

    public function eventAddAction(Request $request) {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) {
                $event = new Event;

                $event->name = $request->name;
                $event->creator = $request->creator;
                $event->desc = $request->desc;
                $event->start = $request->start;
                $event->end = $request->end;
                $event->day = $request->day;
                $event->place = $request->place;
                $event->visible = 1;

                $event->save();

                return redirect('panel/events');
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    public function eventEdit($id) {
        if(Auth::check()) {
            $days = Day::all();
            $event = Event::findOrFail($id);

            if(AuthChecking::checkAuth(0)) return view('panel.eventEdit', compact('days'), compact('event'));
            else redirect('/');
        }
        else return redirect('/');
    }

    public function eventEditAction(Request $request) {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) {
                $event = Event::findOrFail($request->id);

                $event->name = $request->name;
                $event->creator = $request->creator;
                $event->desc = $request->desc;
                $event->start = $request->start;
                $event->end = $request->end;
                $event->day = $request->day;
                $event->place = $request->place;
                $event->visible = $request->visible;

                $event->save();

                return redirect('panel/events');
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    public function changePassword() {
    	if(Auth::check()) return view('panel.changePassword');
    	else return view('auth.login');
    }

    public function changePasswordAction(Request $request) {
    	if(Auth::check()) {
    		$user = Auth::user();
    		$oldPassword = $request->input('oldPassword');
    		$newPassword = $request->input('newPassword');
    		$newPasswordConfirmation = $request->input('newPasswordConfirmation');

    		$check = Hash::check($oldPassword, $user->password);

    		if($newPassword == $newPasswordConfirmation && $check) {
    			$user->password = Hash::make($newPassword);
    			$user->save();
    			return view('panel.changePasswordSuccess');
    		}
    		else {
    			return view('panel.changePasswordError');
    		}
    	}
    	else return view('auth.login');
    }

    public function userPaymentList() {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) {
                $users = User::all();

                return view('panel.paymentList')->with(compact('users'));
            }
        }
    }

    public function userPaymentActivate($id) {
        if(Auth::check()) {
            if(AuthChecking::checkAuth(0)) {
                $user = User::findOrFail($id);

                $user->payment_paid = 1;
                $user->discount = 0;

                $user->save();

                return redirect('panel/users/payment');
            }
        }
    }
}
