
### **1. Basic CRUD Operations**
Demonstrate creating, reading, updating, and deleting records.

```php
use App\Models\User;

// Create a new record
$user = User::create([
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'password' => bcrypt('password123'),
]);

// Retrieve a record
$user = User::find(1); // Find user by ID
echo $user->name;

// Update a record
$user->update(['name' => 'John Smith']);

// Delete a record
$user->delete();
```

---

### **2. Mass Assignment and Guarding**
Show how to safely handle mass assignment.

```php
// In User model
protected $fillable = ['name', 'email', 'password'];

// In controller or live coding demo
$user = User::create([
    'name' => 'Jane Doe',
    'email' => 'janedoe@example.com',
    'password' => bcrypt('password123'),
]);
```

---

### **3. Query Scopes**
Demonstrate filtering with local query scopes.

```php
// In User model
public function scopeActive($query) {
    return $query->where('status', 'active');
}

// In live coding
$activeUsers = User::active()->get();
dd($activeUsers);
```

---

### **4. Relationships**
Show how to define and use Eloquent relationships.

```php
// Models: User and Post
// User model
public function posts() {
    return $this->hasMany(Post::class);
}

// Post model
public function user() {
    return $this->belongsTo(User::class);
}

// In live coding
$user = User::find(1);
foreach ($user->posts as $post) {
    echo $post->title;
}

// Create a related post
$user->posts()->create([
    'title' => 'My First Post',
    'content' => 'This is the post content.',
]);
```

---

### **5. Soft Deletes**
Show how to implement soft deleting.

```php
// In Post model
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    use SoftDeletes;
}

// Migration file
Schema::table('posts', function (Blueprint $table) {
    $table->softDeletes();
});

// In live coding
$post = Post::find(1);
$post->delete(); // Soft delete

// Retrieve only soft-deleted records
$trashedPosts = Post::onlyTrashed()->get();

// Restore a soft-deleted record
Post::withTrashed()->find(1)->restore();
```

---

### **6. Accessors and Mutators**
Show dynamic attributes with accessors and mutators.

```php
// In User model
public function getFullNameAttribute() {
    return "{$this->first_name} {$this->last_name}";
}

public function setPasswordAttribute($value) {
    $this->attributes['password'] = bcrypt($value);
}

// In live coding
$user = User::find(1);
echo $user->full_name; // Accessor

$user->password = 'newpassword123'; // Mutator
$user->save();
```

---

### **7. Casting Attributes**
Demonstrate automatic type casting.

```php
// In User model
protected $casts = [
    'is_admin' => 'boolean',
    'preferences' => 'array',
];

// In live coding
$user = User::find(1);
$user->is_admin = true;
$user->preferences = ['theme' => 'dark', 'notifications' => true];
$user->save();

dd($user->preferences);
```

---

### **8. Model Events**
Show how to hook into model events.

```php
// In User model
protected static function boot() {
    parent::boot();

    static::creating(function ($user) {
        $user->api_token = Str::random(60);
    });
}

// In live coding
$user = User::create([
    'name' => 'Sam Doe',
    'email' => 'samdoe@example.com',
    'password' => bcrypt('password123'),
]);
echo $user->api_token; // Automatically set during creation
```

---

### **9. Pagination**
Quickly paginate records.

```php
// In live coding
$users = User::paginate(10); // 10 users per page
return view('users.index', compact('users')); // Pass paginated data to a view
```

---

### **10. Global Scope**
Showcase how to add a global scope for consistent filtering.

```php
// In User model
protected static function booted() {
    static::addGlobalScope('active', function ($query) {
        $query->where('status', 'active');
    });
}

// In live coding
$users = User::all(); // Automatically fetches only active users
dd($users);
```
