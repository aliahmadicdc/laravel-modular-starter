<?php

namespace App\Http\Middleware\language;

use App\Http\Middleware\BaseMiddleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LanguageManagerMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $this->getLoggedInUser();
        $locale = '';

        if ($user) {
            $userLanguageOption = $user->getOption('language');

            if ($userLanguageOption)
                $locale = $userLanguageOption->option_value;
        } else if (session()->get('locale')) {
            $locale = session()->get('locale');
        } else {
            $locale = $this->getLocaleByIp();
        }

        if (empty($locale))
            $locale = env('APP_LOCALE');

        App::setLocale($locale);

        return $next($request);
    }

    private function getLocaleByIp(): string
    {
        $country = geoip()->getLocation()->iso_code;

        return match ($country) {
            'IR' => 'fa',
            default => 'en'
        };
    }
}
