<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MCodeDashboardController extends Controller
{
    public function index()
    {
        /**

         * @get('/private/m-code-dashboards')
         * @name('private.m-code-dashboards.index')
         * @middlewares(web, auth)
         */
        //////abort_if(Gate::denies('m_code_dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.mCodeDashboards.index');
    }
}
