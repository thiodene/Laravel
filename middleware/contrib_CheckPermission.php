namespace DCPP\auth\Http\Middleware;

use Closure;
use Session;
use DCPP\Auth\Http\Controllers\SecurityController;

class CheckPermission
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        $security = new SecurityController();

        // If session does not exist or user is unauthorized to access current microservice
        if (!Session::has('user') || !$security->check_microservice(env('APP_NAME')))
    	{
			$request->session()->flush(); // delete session
            return redirect(env('MICROSERVICE_USERS'));

        }
        else if (!$security->check_permissions(env('APP_NAME'), $permission)) 
        {
            // If user Authorized in App Check Permissions
            // Redirect...
            return redirect(env('APP_URL'));
        }
        return $next($request);
    }
}
