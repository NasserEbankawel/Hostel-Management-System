<!DOCTYPE html>
<html>
<head>
  <title>New {{ ucfirst($type) }} Added</title>
</head>
<body>
  <h1>A new {{ ucfirst($type) }} has been added!</h1>
  <p>Here are the details of the new {{ $type }}:</p>
  <ul>
    @foreach ($item->getAttributes() as $key => $value)
      <!-- Exclude the password, id, created_at, and updated_at fields -->
      @if (!in_array($key, ['password', 'id', 'created_at', 'updated_at', 'hostel_id']))
        <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
      @endif
    @endforeach
  </ul>
</body>
</html>

