<div class="alert alert-{{ $type }}" role="alert">
    <!-- An unexamined life is not worth living. - Socrates -->
    {{ $message }}
    {{ $slot }} <!-- Pour afficher le contenu entre les balises du composant -->
</div>
{{--  
 Usage Example:  
    tu peux utiliser ce composant dans n'importe quelle vue Blade comme suit: 
    <x-alert type="success" :message="'Operation completed successfully!'" />
    <x-alert type="danger" :message="'An error occurred during the operation.'" />
    <x-alert type="warning" :message="'This is a warning message.'" />
    <x-alert type="info" :message="'This is an informational message.'" />

    explication:
    le composant d'alerte est défini dans resources/views/components/alert.blade.php. 
    Il accepte deux paramètres : type et message. 
    -Le paramètre type détermine le style de l'alerte (success, danger, warning, info), 
    -tandis que le paramètre message contient le texte à afficher dans l'alerte.

    le contoleur qui gere l'alerte est dans {{-- app/view.component/Alert.php --}}  
