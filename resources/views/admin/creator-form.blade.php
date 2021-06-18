 <?php if (isset($edit) && !empty($edit)) {
 $method = 'PUT';
 $root = route('admin.update', compact('creator'));
 $flag = true;
 $title = 'Modifica Creator';
 } else {
 $method = 'POST';
 $root = route('admin.store');
 $flag = false;
 $title = 'Aggiungi un nuovo Creator';
 } ?>

 <div class="container">
     <div class="header">
         <h1>{{ $title }}</h1>
     </div>
     <div class="container body">
         <form action={{ $root }} method="POST" enctype="multipart/form-data">
             @csrf
             @method($method)
             <div class="form-group">
                 <label for="name">Nome Creator</label>
                 <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                     value="{{ isset($creator) ? $creator->name : '' }}" id="name" placeholder="Inserisci un nome"
                     name="name">
                 <div class="invalid-feedback">
                     Inserisci un nome!
                 </div>
             </div>
             <div class="form-group">
                 <label for="subtitle">Breve descrizione</label>
                 <input type="text" class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}"
                     value="{{ isset($creator) ? $creator->subtitle : '' }}" id="name" id="subtitle"
                     placeholder="Inserisci una breve descrizione" name="subtitle">
                     <div class="invalid-feedback">
                     Scrivi una breve descrizione!
                 </div>
             </div>
             <div class="form-group">
                 <label for="description">Descrizione</label>
                 <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                     value="{{ isset($creator) ? $creator->description : '' }}" id="name" id="description"
                     placeholder="Inserisci una descrizione più dettagliata" name="description">
                     <div class="invalid-feedback">
                     Inserisci una descrizione!
                 </div>
             </div>
             <div class="form-group">
                 <label for="description">Seleziona uno stato</label>
                 <select class="custom-select {{ $errors->has('state_name') ? 'is-invalid' : '' }}" multiple
                     name="state_name">
                     @foreach ($states as $state)
                         <option value="{{ $state->id }}" @if (isset($creator) && $creator->state[0]->state_name === $state->state_name) selected @endif>
                             {{ $state->state_name }}
                         </option>
                     @endforeach
                 </select>
                 <div class="invalid-feedback">
                     Seleziona uno stato!
                 </div>
             </div>
             <div class="form-group">
                 <label for="image">Inserisci un'immagine profilo</label>
                 <input type="file" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}"
                     id="image" name="image">
                     <div class="invalid-feedback">
                     Inserisci un'immagine'!
                 </div>
             </div>

             <div class="form-check">
                 <input type="hidden" class="form-check-input" id="visible" name="visible" value="0">
                 <input type="checkbox" class="form-check-input" id="visible" @if (isset($creator) && $creator->visible === 1) checked @endif
                     name="visible" value="1">
                 <label class="form-check-label" for="visible">Visibilità</label>
             </div>
             <button type="submit" class="btn btn-primary">Crea</button>
         </form>
     </div>
 </div>
