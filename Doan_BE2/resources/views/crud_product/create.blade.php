@extends('dashboard')

@section('content')
<div class="container">
    <h2>Add Product</h2>
    <form action="{{ route('products.postProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="number" name="price" placeholder="Price" required><br>
        <input type="number" name="stock" placeholder="Stock" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <select name="category_id" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select><br> 
        <input type="file" name="image"><br>
        <button type="submit">Save</button>
    </form>
</div>
@endsection
