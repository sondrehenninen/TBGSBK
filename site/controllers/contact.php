<?php

return function ($kirby, $page, $site) {
    $formSent  = false;
    $formError = null;

    if ($kirby->request()->is('POST') && get('contact_submit')) {
        $name    = strip_tags(trim(get('name')));
        $email   = strip_tags(trim(get('email')));
        $message = strip_tags(trim(get('message')));

        if (!$name || !$email || !$message) {
            $formError = 'Fyll ut alle feltene.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $formError = 'Ugyldig e-postadresse.';
        } else {
            $recipient = $page->form_recipient()->isNotEmpty()
                ? $page->form_recipient()->value()
                : $site->epost()->value();

            if (!$recipient) {
                $formError = 'Ingen mottaker er konfigurert. Legg inn e-post i Panel.';
            } else {
                try {
                    $kirby->email([
                        'from'     => 'noreply@tonsbergskateboardklubb.no',
                        'fromName' => $site->club_name()->or('TBGSBK')->value(),
                        'replyTo'  => $email,
                        'to'       => $recipient,
                        'subject'  => 'Ny melding fra kontaktskjema — ' . $name,
                        'body'     => "Navn: {$name}\nE-post: {$email}\n\nMelding:\n{$message}",
                    ]);
                    $formSent = true;
                } catch (Exception $e) {
                    $formError = 'Noe gikk galt. Prøv igjen eller send e-post direkte.';
                }
            }
        }
    }

    return compact('formSent', 'formError');
};
