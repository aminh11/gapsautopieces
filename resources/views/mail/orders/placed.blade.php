<x-mail::message>
# Commande passée avec succès !

Merci d'avoir passé votre commande. Votre numéro de commande est: {{ $order->id }}.

<x-mail::button :url="$url">
Voir Commande
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
