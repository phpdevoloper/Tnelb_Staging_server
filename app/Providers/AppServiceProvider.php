<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Admin\Tnelb_Footercopyright;
use App\Models\Admin\Tnelb_submenus;
use App\Models\Admin\TnelbMenu;
use App\Models\SiteStatistic;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View as FacadesView;

use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
    {
        // Force HTTPS only in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        FacadesView::composer('admincms.include.navbar', function ($view) {
            $user = Auth::user();

            if ($user && $user->email === 'admin@tnelb.com') {
                $menus = TnelbMenu::whereNotIn('id', [1, 2, 3])->orderBy('order_id')->get();
                $memberlist = TnelbMenu::where('menu_name_en', 'members')->first();
                $submenus = Tnelb_submenus::all();
            } else {
                $menus = TnelbMenu::orderBy('order_id')->get();
                $submenus = Tnelb_submenus::all();
                $memberlist = TnelbMenu::where('menu_name_en', 'members')->first();
            }

            $view->with([
                'menus' => $menus,
                'submenus' => $submenus,
                'memberlist' => $memberlist,
            ]);
        });

        FacadesView::composer('include.footer', function (View $view) {
            $configured = config('tnelb.footer_last_updated');
            if ($configured) {
                try {
                    $siteFooterLastUpdated = Carbon::parse($configured)->format('d M Y');
                } catch (\Throwable $e) {
                    $siteFooterLastUpdated = (string) $configured;
                }
            } else {
                $copyright = Tnelb_Footercopyright::first();
                if ($copyright?->updated_at) {
                    $siteFooterLastUpdated = $copyright->updated_at->format('d M Y');
                } else {
                    $siteFooterLastUpdated = now()->format('d M Y');
                }
            }

            $siteVisitorCount = (int) (SiteStatistic::query()->find(1)?->visitor_count ?? 0);

            $view->with([
                'siteFooterLastUpdated' => $siteFooterLastUpdated,
                'siteVisitorCount' => $siteVisitorCount,
            ]);
        });
    }

}
