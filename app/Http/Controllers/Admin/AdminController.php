<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Administration Status Page
     */
    public function index(): View
    {

        /* References
         *
         * Laravel: How to Show Number/List of Users Currently Online.
         * (2025, October 27). Laravel Daily.
         * https://laraveldaily.com/post/laravel-show-number-list-of-users-currently-online
         */

        $userCount = User::count();
        $userUnverifiedCount = User::where('email_verified_at', null)->count();
        $userSuspendedCount = User::whereNot('suspended_at', null)->count();
        $userBannedCount = User::whereNot('banned_at', null)->count();
        $userLoggedInCount = DB::table(config('session.table'))->count();
        $passengerCount = 987632;
        $productCount = 23653;
        $categoryCount = 64;
        $jokeCount = 432;
        $toDoCount = 4749;
        $bookCount = 5663;
        $carCount = 435663;
        $salesTotal = 397530;
        $visitorCount = 999999999999;
        $roleCount = 321;

        return view('admin.index')
            ->with('book_count', Number::format($bookCount))
            ->with('category_count', Number::format($categoryCount))
            ->with('car_count', Number::format($carCount))
            ->with('joke_count', Number::format($jokeCount))
            ->with('passenger_count', Number::format($passengerCount))
            ->with('product_count', Number::format($productCount))
            ->with('role_count', Number::format($roleCount))
            ->with('sales_total', Number::currency($salesTotal, in: 'AUD', locale: 'en_AU', precision: 0))
            ->with('todo_count', Number::format($toDoCount))
            ->with('user_count', Number::format($userCount))
            ->with('user_logged_in_count', Number::format($userLoggedInCount))
            ->with('user_suspended_count', Number::format($userSuspendedCount))
            ->with('user_unverified_count', Number::format($userUnverifiedCount))
            ->with('user_banned_count', Number::format($userBannedCount))
            ->with('visitor_count', Number::format($visitorCount))
            ->with('notice', '');
    }
}
