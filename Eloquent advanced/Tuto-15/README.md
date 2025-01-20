```markdown
# Tutorial 15: Advanced Role and Permission Management with Spatie

## Part 1: Using Spatie in a Simple Way

### Learning Objective
Learn how to integrate and use the Spatie Laravel Permission package to manage roles and permissions in a Laravel application in a basic way.

### Topics Covered
- Installing and configuring the package.
- Defining roles and permissions.
- Protecting routes and controllers using middleware.

### Theoretical Explanation

#### Introduction to Spatie Laravel Permission
The **Spatie Laravel Permission** package allows managing roles and permissions directly in a database. It simplifies access control implementation and integrates seamlessly with Laravel features like middleware and policies.

**Key features of the package include:**
- Creating roles and permissions through dedicated models.
- Assigning roles and permissions to users.
- Verifying permissions in routes, controllers, and views.

---

### Middleware for Authorization

#### Middleware `permission`
This middleware checks if a user has a specific permission before accessing a route.

**Example:**
```php
Route::get('/dashboard', function () {
    return 'Welcome to the dashboard.';
})->middleware('permission:view dashboard');
```
Here, only users with the `view dashboard` permission can access the `/dashboard` route.

#### Checking Multiple Permissions
The middleware can check for multiple permissions using a comma-separated list:

```php
Route::get('/manage', function () {
    return 'Resource management.';
})->middleware('permission:view dashboard,manage resources');
```
The user must have all the listed permissions to access the route.

#### Middleware `role`
This middleware checks if a user has a specific role.

**Example:**
```php
Route::get('/admin', function () {
    return 'Welcome to the admin page.';
})->middleware('role:admin');
```

#### Customizing Access Denied Responses
If a user tries to access a protected route without the required permissions or roles, a `403 Forbidden` exception is thrown. You can customize this response in the `Handler.php` file:

```php
public function render($request, Throwable $exception)
{
    if ($exception instanceof AuthorizationException) {
        return response()->view('errors.403', [], 403);
    }

    return parent::render($request, $exception);
}
```

---

### Advantages of Middleware
- **Centralization:** Simplifies access management at the route level.
- **Flexibility:** Supports dynamic roles and permissions.
- **Ease of Integration:** Directly registered in `Kernel.php` after installing Spatie.

---

### Steps

#### Step 1: Install and Configure the Package
Install the package via Composer:
```bash
composer require spatie/laravel-permission
```

Publish the configuration and migration files:
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

Add the `HasRoles` trait to the `User` model:
```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
```

#### Step 2: Initialize Roles and Permissions with a Seeder
Create a Seeder file:
```bash
php artisan make:seeder RolePermissionSeeder
```

Define roles and permissions in the Seeder:
```php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'editor']);

        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'edit articles']);

        Role::findByName('admin')->givePermissionTo(Permission::all());
        Role::findByName('editor')->givePermissionTo(['view dashboard', 'edit articles']);
    }
}
```

Run the Seeder to populate the database:
```bash
php artisan db:seed --class=RolePermissionSeeder
```

#### Step 3: Protect Routes and Actions
Protect routes with permission-based middleware:
```php
Route::middleware(['permission:view dashboard'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Welcome to the dashboard.';
    });
});
```

Check permissions in a controller:
```php
public function edit()
{
    if (!auth()->user()->can('edit articles')) {
        abort(403, 'Access denied.');
    }

    return view('articles.edit');
}
```

Use Blade to conditionally display UI elements:
```blade
@can('edit articles')
    <button>Edit Article</button>
@endcan
```

---

## Part 2: Introduction to Our Prototype

### Learning Objective
Understand and integrate centralized permission management into controllers using a custom method based on Spatie Laravel Permission.

### Topics Covered
- Dynamic permission management using the `callAction` method.
- Automating permission checks in controllers.
- Centralizing logic for easier maintenance.

---

### Steps

#### Step 1: Implement the Centralized Method
Add a `callAction` method to a base controller:
```php
namespace Modules\Core\Controllers\Base;

class AdminController extends AppController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function callAction($method, $parameters)
    {
        $controller = class_basename(get_class($this));
        $action = $method;

        $permissionName = str_replace(['Controller', '@'], ['', '-'], $controller) . '-' . $action;

        $this->authorize($permissionName);

        return parent::callAction($method, $parameters);
    }
}
```

#### Step 2: Practical Demonstration
Create a permission using the Seeder:
```php
Permission::create(['name' => 'index-adminController']);
Role::findByName('admin')->givePermissionTo('index-adminController');
```

Add a protected route:
```php
Route::get('/admin/dashboard', [AdminController::class, 'index']);
```

Define the `index` action in the controller:
```php
public function index()
{
    return 'Welcome to the admin page.';
}
```

---

## Conclusion
- **Part 1:** You learned to use Spatie Laravel Permission for basic role and permission management.
- **Part 2:** You explored a centralized method to integrate permission management into your controllers.

This tutorial provides a solid foundation for implementing secure and maintainable authorization management in your Laravel projects.
```
