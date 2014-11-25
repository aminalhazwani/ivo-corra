<?php if(!defined('KIRBY')) exit ?>

# about blueprint

title: Page
pages: false
files: true
fields:
    title: 
        label: Titolo pagina
        type:  text
    bio: 
        label: Biografia
        type:  textarea
        size:  large
        buttons: true
    address: 
        label: Via/piazza e numero civico
        type:  text
    phone: 
        label: Numero di telefono fisso
        type:  text
    mobile: 
        label: Numero cellulare
        type:  text
    city:
        label: CAP e città
        type: text
    province:
        label: Provincia
        type: text
    mail: 
        label: Indirizzo Email
        type:  text
    botmail: 
        label: Indirizzo Email per SPAMMER
        type:  text
    fiscal: 
        label: Codice Fiscale
        type:  text
    vat: 
        label: Partita Iva
        type:  text
