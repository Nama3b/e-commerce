# e-commerce

Sửa trong RedirectsUsers thành như sau:
return property_exists($this, 'redirectTo') ? $this->redirectTo : '/dashboard/home';

Sửa trong AuthenticateUsers thành như sau:
public function showLoginForm()
{
return view('auth.dashboard-login');
}
