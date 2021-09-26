@extends('layouts.main')
@section('title', 'Editando: ' . $event->title)
@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Nome do evento" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $event->date->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" name="city" id="city" class="form-control" id="city" placeholder="Local do evento" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado?</label>
                <select class="form-control" id="private" name="private" placeholder="Nome do evento">
                    <option value="0">Nao</option>
                    <option value="1" {{ $event->private == 1 ? 'selected="selected"' : '' }}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" class="form-control" id="description" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="items">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Food"> Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </form>
    </div>

@endsection
