use Illuminate\Support\Facades\Gate;

public function boot()
{
    $this->registerPolicies();

    Gate::define('access-admin-panel', function ($user) {
        return $user->role === 'admin';
    });
}