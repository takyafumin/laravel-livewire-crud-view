<div>
    <h1>CRUD Diagram</h1>
    <ul>
        @foreach($entities as $entity)
            <li>{{ $entity['name'] }} - {{ $entity['description'] }}</li>
        @endforeach
    </ul>
</div>
