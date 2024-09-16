<?php

namespace App\Http\Middleware;

use App\Helpers\Admin\Helper;
use Closure;
use Illuminate\Http\Request;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->ajax()) {

            if (auth()
                ->user()->sudo
            ) return $next($request);


            $query = auth()
                ->user()
                ->user_class
                ->rights()
                ->where('path', Helper::getAdminPathByUrl(\Request::url()));

            if ($request->isMethod('post')) {
                if ($query->where('type', 'edit')->get()->isEmpty()) abort(403);
            } else {
                if (isset($request->delete)) {
                    if ($query->where('type', 'delete')->get()->isEmpty()) abort(403);
                } else {
                    if ($query->where('type', 'read')->get()->isEmpty()) abort(403);
                }
            }
        }

        return $next($request);
    }
}
