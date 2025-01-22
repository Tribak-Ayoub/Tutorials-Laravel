## **Laravel Models**

### **What is a Laravel Model?**
A Laravel Model represents a table in your database and provides a way to interact with it using object-oriented methods. Each model corresponds to a single table and is used to query, insert, update, and delete records.

---

### **Key Features of Laravel Models**

1. **Table Association**
   - By default, Laravel assumes the table name is the plural form of the model's name.
     - Example: `User` model → `users` table.
   - You can override this by defining a `$table` property in the model:
     ```php
     protected $table = 'my_custom_table';
     ```

2. **Primary Key**
   - By default, the primary key column is `id`.
   - You can customize it using the `$primaryKey` property:
     ```php
     protected $primaryKey = 'custom_id';
     ```
   - You can also define if the primary key is non-incrementing or non-numeric with `$incrementing` and `$keyType`.

3. **Timestamps**
   - Laravel automatically manages `created_at` and `updated_at` columns.
   - To disable this behavior:
     ```php
     public $timestamps = false;
     ```

4. **Eloquent ORM**
   - Laravel models use Eloquent, an Object-Relational Mapper (ORM) for database interactions.
   - Common Eloquent methods:
     - `all()`: Retrieve all records.
     - `find($id)`: Find a record by its primary key.
     - `where()`: Filter results based on a condition.
     - `create()` and `update()`: Insert or update records.

5. **Mass Assignment**
   - To allow mass assignment of certain attributes, define a `$fillable` array:
     ```php
     protected $fillable = ['name', 'email'];
     ```
   - Alternatively, use `$guarded` to specify attributes that cannot be mass-assigned:
     ```php
     protected $guarded = ['id'];
     ```

6. **Relationships**
   - Models can define relationships to represent database associations:
     - **One-to-One:** `hasOne` and `belongsTo`
     - **One-to-Many:** `hasMany` and `belongsTo`
     - **Many-to-Many:** `belongsToMany`
     - **Polymorphic Relationships:** For dynamic relationships between models.

7. **Scopes**
   - Scopes provide reusable query logic:
     - **Local Scopes:** Defined as methods prefixed with `scope` in a model.
       ```php
       public function scopeActive($query) {
           return $query->where('status', 'active');
       }
       ```
       Usage: `User::active()->get();`
     - **Global Scopes:** Automatically applied to all queries of the model.

8. **Accessors and Mutators**
   - **Accessors:** Transform attributes when retrieving them.
     ```php
     public function getFullNameAttribute() {
         return "{$this->first_name} {$this->last_name}";
     }
     ```
   - **Mutators:** Modify attributes before saving them to the database.
     ```php
     public function setPasswordAttribute($value) {
         $this->attributes['password'] = bcrypt($value);
     }
     ```

9. **Model Events**
   - Laravel models provide hooks for various lifecycle events (e.g., `creating`, `created`, `updating`).
   - You can register them in the model's `boot` method:
     ```php
     protected static function boot() {
         parent::boot();
         static::creating(function ($model) {
             $model->uuid = Str::uuid();
         });
     }
     ```

10. **Soft Deletes**
    - Allow models to be "deleted" without removing them from the database.
    - Add the `SoftDeletes` trait to the model:
      ```php
      use Illuminate\Database\Eloquent\SoftDeletes;

      class Post extends Model {
          use SoftDeletes;
      }
      ```

11. **Casting Attributes**
    - Automatically cast attributes to a specific type:
      ```php
      protected $casts = [
          'is_admin' => 'boolean',
          'options' => 'array',
      ];
      ```

---

### **Why Are Laravel Models Important?**
Laravel models encapsulate database logic, making your code more readable, reusable, and maintainable. They provide an elegant API to interact with your database, reducing the need for raw SQL.
