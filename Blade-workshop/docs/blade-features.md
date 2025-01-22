## **Laravel Blade**

Laravel Blade is Laravel's powerful, easy-to-use templating engine. It provides a simple yet elegant syntax for working with PHP while enabling seamless integration with your application's data. Here's a summary of the most important features:

---

### **1. Blade Syntax Overview**
- **Echo Statements**: Output data using `{{ $variable }}`. This automatically escapes data to prevent XSS attacks.
  - Use `{!! $variable !!}` for unescaped output.
  
- **Comments**: Add comments in templates with `{{-- Comment here --}}`.

---

### **2. Blade Directives**
Blade comes with various directives for logic and templating:

#### **Conditional Statements**
- `@if`, `@elseif`, `@else`, `@endif`:
  ```php
  @if($condition)
      // Code
  @elseif($otherCondition)
      // Code
  @else
      // Code
  @endif
  ```

- `@unless`: Shorthand for `if not`:
  ```php
  @unless($condition)
      // Code
  @endunless
  ```

#### **Loops**
- `@for`, `@foreach`, `@while`, `@forelse`:
  ```php
  @foreach($items as $item)
      {{ $item }}
  @endforeach
  ```

  `@forelse` is used to handle empty collections:
  ```php
  @forelse($items as $item)
      {{ $item }}
  @empty
      No items found.
  @endforelse
  ```

#### **Switch Statements**
- `@switch`:
  ```php
  @switch($variable)
      @case('value')
          // Code
          @break
      @default
          // Default code
  @endswitch
  ```

---

### **3. Blade Components and Slots**
Reusable components for UI consistency:
- Define a component: Create a Blade file in the `resources/views/components` folder.
- Include it using `<x-component-name>` or `@component`.

Example:
```php
// Example Component File: resources/views/components/alert.blade.php
<div class="alert alert-{{ $type }}">
    {{ $slot }}
</div>

// Usage:
<x-alert type="error">
    This is an error message.
</x-alert>
```

---

### **4. Blade Layouts and Sections**
#### **Layouts**
Define a common layout in `resources/views/layouts`. Use `@yield` to define sections.

Example:
```php
// resources/views/layouts/app.blade.php
<html>
  <body>
    <header>@yield('header')</header>
    <main>@yield('content')</main>
  </body>
</html>
```

#### **Extending Layouts**
Use `@extends` and `@section` to define sections in child views:
```php
@extends('layouts.app')

@section('header')
    <h1>Header Content</h1>
@endsection

@section('content')
    <p>Main content here.</p>
@endsection
```

---

### **5. Blade Includes**
Include subviews with `@include`:
```php
@include('partials.header')
```

---

### **6. Blade Data Binding**
Pass data from controllers to Blade views:
```php
return view('welcome', ['name' => 'John']);
```
Access the variable in Blade:
```php
{{ $name }}
```

---

### **7. Loops with Index and Iteration**
Access loop variables using `$loop`:
```php
@foreach($items as $item)
    {{ $loop->index }}: {{ $item }}
@endforeach
```

---

### **8. JSON and JavaScript Support**
- `@json($array)` converts arrays to JSON.
- Use `@push` and `@stack` for injecting JavaScript or styles into specific sections.

---

### **9. Blade Conditionals with Classes**
Simplify conditional class rendering with `@class` directive:
```php
<div @class(['alert', 'alert-success' => $isSuccess])>
    Message here.
</div>
```

---

### **10. Advanced Features**
- **Include When**: Include a subview conditionally:
  ```php
  @includeWhen($condition, 'view.name')
  ```
- **Raw PHP**: Use `@php` and `@endphp` for PHP code:
  ```php
  @php
      $value = 10;
  @endphp
  ```

- **Custom Blade Directives**: Define custom directives in the service provider:
  ```php
  Blade::directive('datetime', function ($expression) {
      return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
  });
  ```
