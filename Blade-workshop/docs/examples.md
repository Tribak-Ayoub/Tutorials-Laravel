
### **1. Echo Statements and Escaping**
Start by explaining how Blade handles output:
```blade
<h1>Task Management</h1>

{{-- Safe output --}}
<p>Welcome, {{ $username }}!</p>

{{-- Unescaped output --}}
<p>{!! $htmlContent !!}</p>
```
**Livecoding Idea**: Show how changing `$htmlContent` affects the rendering.

---

### **2. Conditional Rendering**
Display a message based on a condition:
```blade
@if($tasks->isEmpty())
    <p>No tasks available. Add one now!</p>
@else
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
@endif
```
**Livecoding Idea**: Modify `$tasks` array to dynamically show/hide the list or the "no tasks" message.

---

### **3. Loops with `$loop` Variables**
Enhance the task list with loop features:
```blade
<ul>
    @foreach($tasks as $task)
        <li>
            {{ $loop->iteration }}. {{ $task }}
            @if($loop->last)
                <strong>(Last Task!)</strong>
            @endif
        </li>
    @endforeach
</ul>
```
**Livecoding Idea**: Add tasks and highlight the first or last task in the list using `$loop` attributes.

---

### **4. Blade Components**
Create a reusable alert component:

**Alert Component (`resources/views/components/alert.blade.php`)**
```blade
<div class="alert alert-{{ $type }}">
    {{ $slot }}
</div>
```

**Use the Component**
```blade
<x-alert type="success">Task added successfully!</x-alert>
<x-alert type="error">Failed to add task. Try again.</x-alert>
```
**Livecoding Idea**: Dynamically change the `type` attribute and message to showcase reusability.

---

### **5. Layouts and Sections**
Set up a layout file and extend it in child views:

**Layout File (`resources/views/layouts/app.blade.php`)**
```blade
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Task Manager')</title>
</head>
<body>
    <header>
        @yield('header', 'Welcome to Task Manager')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; {{ date('Y') }}
    </footer>
</body>
</html>
```

**Child View**
```blade
@extends('layouts.app')

@section('title', 'Tasks Page')

@section('header')
    <h1>Your Tasks</h1>
@endsection

@section('content')
    <p>Here is your task list:</p>
    @include('partials.task-list', ['tasks' => $tasks])
@endsection
```
**Livecoding Idea**: Show how changing `@section` dynamically updates the layout.

---

### **6. Include Partials**
Use partials for cleaner templates:

**Task List Partial (`resources/views/partials/task-list.blade.php`)**
```blade
<ul>
    @forelse($tasks as $task)
        <li>{{ $task }}</li>
    @empty
        <p>No tasks found.</p>
    @endforelse
</ul>
```

**Include in Main View**
```blade
@include('partials.task-list', ['tasks' => $tasks])
```
**Livecoding Idea**: Swap out the partial or add new tasks to demonstrate flexibility.

---

### **7. Conditional Classes with `@class`**
Style tasks dynamically:
```blade
<ul>
    @foreach($tasks as $task)
        <li @class(['completed' => $task->isCompleted])>
            {{ $task->name }}
        </li>
    @endforeach
</ul>
```
**Livecoding Idea**: Toggle the `isCompleted` attribute and demonstrate how classes change instantly.

---

### **8. JavaScript Integration with `@push` and `@stack`**
Add a custom script section for interactivity:

**Layout File**
```blade
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    <main>
        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>
```

**Child View**
```blade
@extends('layouts.app')

@section('content')
    <button id="taskButton">Click Me</button>
@endsection

@push('scripts')
    <script>
        document.getElementById('taskButton').addEventListener('click', function() {
            alert('Task button clicked!');
        });
    </script>
@endpush
```
**Livecoding Idea**: Show how the button script is dynamically injected.

---

### **9. JSON for API-like Data**
Render JSON data for frontend interaction:
```blade
<script>
    let tasks = @json($tasks);
    console.log(tasks);
</script>
```
**Livecoding Idea**: Update the `$tasks` array in the controller and show how the JSON reflects the changes.

---

### **10. Custom Blade Directive**
Define a custom directive in a service provider:
```php
Blade::directive('uppercase', function ($expression) {
    return "<?php echo strtoupper($expression); ?>";
});
```

**Use the Directive**
```blade
<p>@uppercase('this is a custom directive!')</p>
```
**Livecoding Idea**: Create and test custom directives live.

