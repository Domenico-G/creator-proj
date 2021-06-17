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
                 <input type="text" class="form-control" value="{{ isset($creator) ? $creator->name : '' }}" id="name"
                     placeholder="Inserisci un nome" name="name">
             </div>
             <div class="form-group">
                 <label for="subtitle">Breve descrizione</label>
                 <input type="text" class="form-control" value="{{ isset($creator) ? $creator->subtitle : '' }}"
                     id="name" id="subtitle" placeholder="Inserisci una breve descrizione" name="subtitle">
             </div>
             <div class="form-group">
                 <label for="description">Descrizione</label>
                 <input type="text" class="form-control" value="{{ isset($creator) ? $creator->description : '' }}"
                     id="name" id="description" placeholder="Inserisci una descrizione più dettagliata"
                     name="description">
             </div>
             <div class="form-group">
                 <label for="description">Seleziona uno stato</label>
                 <select class="custom-select"  multiple name="state_name">
                     <option selected value="Abbandonato">One</option>
                     <option value="In tendenza">Two</option>
                     <option value="Nuovo">Three</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="image">Inserisci un'immagine profilo</label>
                 <input type="file" class="form-control-file" id="image" name="image">
             </div>

             <div class="form-check">
                 <input type="hidden" class="form-check-input" id="visible" name="visible" value="0">
                 <input type="checkbox" class="form-check-input" id="visible"
                 @if ($creator->visible === 1)
                     checked
                 @endif
                  name="visible" value="1">
                 <label class="form-check-label" for="visible" >Visibilità</label>
             </div>
             <button type="submit" class="btn btn-primary">Crea</button>
         </form>
     </div>
 </div>
