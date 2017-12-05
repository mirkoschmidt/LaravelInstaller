<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use App\Http\Controllers\Controller;
use RachidLaasri\LaravelInstaller\Helpers\EnvironmentManager;
use RachidLaasri\LaravelInstaller\Helpers\FinalInstallManager;
use Symfony\Component\Console\Output\BufferedOutput;

class WelcomeController extends Controller
{

    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('vendor.installer.welcome');
    }

    public static function start()
    {
        $outputLog  = new BufferedOutput;
        $envManager = new EnvironmentManager();

        $envManager->createEnv();

        FinalInstallManager::publishVendorAssets($outputLog);

        return response()->redirectTo(url('/install'));
    }

}